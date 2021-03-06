<?php

namespace App\Services;

use App\Data\Repositories\Users;
use App\Services\Traits\RemoteRequest;

class Authentication
{
    const LOGIN_URL = 'https://apiportal.alerj.rj.gov.br/api/v1.0/ldap/0IYFFiMHuUr1sYo6wEtjUsJQ7Zicg33SMuvtrFk9yEgwrORmblNSMdpTH0ZTRKX2BhADIusjXHInHW3cspyosOoNrbd5jObK5Uoh/login';

    const USER_INFO_URL = 'http://apiportal.alerj.rj.gov.br/api/v1.0/ldap/d6fFGg5h4jui1k5loFG3p7d6fg5h4j3kDS8HJ/user';

    const PERMISSIONS_URL = 'http://apiportal.alerj.rj.gov.br/api/v1.0/adm-user/K7k8H95loFpTH0ZTRKX2BhADIusjXHInHW3cspyosOoNrbd5jOG3pd61F4d6fg584Gg5h4DSjui1k/permissions';

    /**
     * @var Guzzle
     */
    protected $guzzle;

    protected $remoteRequest;

    /**
     * @var Users
     */
    private $usersRepository;

    public function __construct(Users $usersRepository, RemoteRequest $remoteRequest)
    {
        $this->usersRepository = $usersRepository;

        $this->remoteRequest = $remoteRequest;
    }

    public function attempt($credentials, $remember)
    {
        $credentials['username'] = $this->extractUsernameFromEmail($credentials['email']);

        return $this->loginUser(
            $credentials,
            $this->remoteRequest->post(static::LOGIN_URL, $credentials),
            $remember
        );
    }

    protected function extractUsernameFromEmail($email)
    {
        if (($pos = strpos($email, '@')) === false) {
            return $email;
        }

        return substr($email, 0, $pos);
    }

    protected function instantiateGuzzle()
    {
        $this->guzzle = new Guzzle();
    }

    /**
     * @param $credentials
     * @param $response
     * @param $remember
     *
     * @return mixed
     */
    private function loginUser($credentials, $response, $remember)
    {
        if ($success = $response['success']) {
            $this->usersRepository->loginUser($credentials, $remember);
        }

        return $success;
    }
}
