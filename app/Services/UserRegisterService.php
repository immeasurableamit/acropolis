<?php

namespace App\Services;

use File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use App\Repository\UserRegistrationRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRegisterService
{
    private $userRepository;

    /**
     * UserRegistrationRepositoryInterface constructor.
     * @param UserRegistrationRepositoryInterface $userRepository
     */
    public function __construct(UserRegistrationRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserCreateRequest $request
     * @return mixed
     */
    public function createUser(UserCreateRequest $request)
    {
        $payload = $request->post();
        $payload['created_by'] = auth()->user()->id;
        $payload['password'] = Hash::make($request['password']);

        $user = $this->userRepository->create($payload);

        $this->handleModulePictureCrop($user);

        return $user;
    }

    /**
     * @param User $user
     */
    public function handleModulePictureCrop(User $user)
    {

        if (request()->hasFile('profile_picture')) {
            $destination = PROFILE_PICTURE_IMAGE_PATH . '/' . $user->id;


            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0777, true, true);
            }

            $file = request()->profile_picture;
            $fileName = Str::random(10) . '.' . $file->extension();

            Image::make($file)->fit(200, 200)->save($destination . '/' . $fileName);

            $user->profile_picture = $fileName;
            $user->save();
        }
    }

    /**
     * @param User $user
     */
    public function updateUser()
    {
        $user = $this->userRepository->find(request('id'));

        $payload = request()->all();

        $payload['updated_by'] = auth()->user()->id;

        $this->userRepository->update($payload, $user->id);

        if (request()->profile_picture) {
            $this->handleModulePictureCrop($user);
        }
    }

    public function get()
    {
        return $this->userRepository->all();
    }

    /**
     * Get post by id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

}
