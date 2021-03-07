<?php
/**
 * @OA\Info(title="TechBase VN Test", version="0.1")
 */

/**
 *  @OA\Post(
 *      path="/api/login",
 *      summary="Login",
 *      tags={"Auth"},
 *      @OA\RequestBody(
 *      description="Please use info to login for test
 *                      Mananger: email :manager@gmail.com, password:123456
 *                      CEO: email :director@gmail.com, password:123456",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="email",type="email"),
 *                  @OA\Property(property="password",type="string"),
 *                  example={
 *                      "email"     : "manager@gmail.com",
 *                      "password"  : "123456",
 *                  }
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Response accesstoken when login successfully",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 @OA\Property(property="success",type="boolean"),
 *                 @OA\Property(property="data",type="text"),
 *                 example={"success": "true", "data" : {"token" : "access token string"}}
 *             )
 *        )
 *   ),
 *   security={{"Bearer": {}}}
 *  )
 */

 /**
 * @OA\Get(
 *       path="/api/user/list",
 *       tags={"User"},
 *       summary="Get List Employee",
 *       description="Returns list employee",
 *       @OA\Parameter(in="query",name="limit",@OA\Schema(type="number")),
 *       @OA\Parameter(in="query",name="current_page",@OA\Schema(type="number")),
 *       @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\MediaType(
 *          mediaType="application/json",
 *               @OA\Schema(
 *                   @OA\Property(property="status",type="boolean"),
 *                   example={
 *                       "status": "true",
 *                       "data": {
 *                           {
 *                              "id": 1693478820380037,
 *                              "email": "myrtle53@example.com",
 *                              "role": "employee",
 *                              "full_name": "Dino Stehr",
 *                              "created_at": "2021-03-06T10:40:56.000000Z",
 *                              "team_info": {}
 *                            },
 *                            {
 *                              "id": 1693478820384558,
 *                              "email": "creola57@example.com",
 *                              "role": "employee",
 *                              "full_name": "Julia Schimmel",
 *                              "created_at": "2021-03-06T10:40:56.000000Z",
 *                              "team_info": {
 *                                  {
 *                                      "team_id": "1693478829196749",
 *                                      "team_name": "Team-Reservation Agent OR Transportation Ticket Agent",
 *                                      "department_name": "Department-2"
 *                                  }
 *                               }
 *                             },
 *                             },
 *                                  "pagination": {
 *                                  "total": 1702,
 *                                  "per_page": 50,
 *                                  "total_page": 35,
 *                                  "current_page": 1
 *                              }
 *                   }
 *               )
 *          )
 *       ),
 *       security={{"Bearer": {}}}
 * )
 */
