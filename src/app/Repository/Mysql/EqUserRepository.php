<?php

namespace App\Repository\Mysql;
use App\Contracts\Repository\UserRepository;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;

class EqUserRepository extends BaseRepository implements UserRepository {

    /**
     * @author DuongMinhQuy <duongquy.ltv@gmail.com>
     * Get list all user
     */
    public function getListUser(array $filters)
    {

        $paged    = ! empty($filters['current_page']) ? $filters['current_page'] : 1;
        $limit    = ! empty($filters['limit']) ? $filters['limit'] : config('common.limit');
        $dataUser = User::select(['id', 'email', 'role', 'full_name', 'created_at'])
                        ->with(['userOfTeamInfo' => function($query){
                                    $query->with(['team' => function($q){
                                                $q->with(['department']);
                                            }]);
                                }]);

        Paginator::currentPageResolver(function () use ($paged) {
            return $paged;
        });

        $dataUser      = $dataUser->paginate($limit);
        $arrayDataUser = $dataUser->getCollection()->toArray();
        $arrayDataUser = array_map(function($data){
            $user_of_team_info = array_map(function($v){
                                    return [
                                        'team_id'          => $v['team_id'],
                                        'team_name'        => $v['team']['team_name'],
                                        'department_name'  => $v['team']['department']['dep_name']
                                    ];
                                }, $data['user_of_team_info']);
            $data= [
                "id"         =>  $data['id'],
                "email"      =>  $data['email'],
                "role"       =>  $data['role'],
                "full_name"  =>  $data['full_name'],
                "created_at" => $data['created_at'],
                'team_info'  => $user_of_team_info
            ];
            return $data;
        },$arrayDataUser);

        $pagination = [
            'total'         => $dataUser->total(),
            'per_page'      => $dataUser->count(),
            'total_page'    => $dataUser->lastPage(),
            'current_page'  => $dataUser->currentPage()
        ];

        return $this->dataReturn($arrayDataUser, 'List Info User', $pagination);
    }

    public function login($data)
    {

        if( Auth::attempt(['email' => $data['email'], 'password' => $data['password']]) ){
            $user = Auth::user();
            return [
                'status'   => true,
                'data'     => ['token' => $this->generateToken($user)]
            ];
        }
    }

    public function auth(string $verify_signature = ''): array {
        return (array) JWT::decode($verify_signature, env('JWT_SECRET_KEY'), array('HS256'));

    }

    private function generateToken($user)
    {
        $data = [
            'id'        => $user['id'],
            'full_name' => $user['full_name'],
            'email'     => $user['email'],
            'role'      => $user['role']
        ];

        return  (JWT::encode($data, env('JWT_SECRET_KEY')));
    }
}
