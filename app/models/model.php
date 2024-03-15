<?php
include_once './config.php';
include_once './app/helpers/db.helper.php';
class Model {
    protected $db;

    function __construct() {
        $this->db = DBHelper::connectDB();
        $this->deploy(); //ES LO MISMO DE SIEMPRE PERO CON EL CODIGO TRAIDO DE OTRO LADO (CONFIG.PHP) ES LO MISMO DE SIEMPREEE
    }
    
    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql =<<<END

            --
            -- Base de datos: `db_melloman`
            --

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `discos`
            --

            CREATE TABLE `discos` (
            `album_id` int(11) NOT NULL,
            `title` varchar(50) NOT NULL,
            `artist` varchar(50) NOT NULL,
            `dyear` int(11) NOT NULL,
            `producer` varchar(50) NOT NULL,
            `genre` varchar(50) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `discos`
            --

            INSERT INTO `discos` (`album_id`, `title`, `artist`, `dyear`, `producer`, `genre`) VALUES
            (5, 'South of Heaven', 'Slayer', 1988, 'Rick Rubin', 'Thrash Metal'),
            (6, 'sxasdas', 'asdasda', 1999, 'asdasd', 'asdasd'),
            (7, 'asdasda', 'asdasdas', 2020, 'awdasdfa', 'asafa');

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `reviews`
            --

            CREATE TABLE `reviews` (
            `review_id` int(11) NOT NULL,
            `album_id` int(11) NOT NULL,
            `user_id` int(11) NOT NULL,
            `review` varchar(250) NOT NULL,
            `rating` tinyint(4) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `users`
            --

            CREATE TABLE `users` (
            `user_id` int(11) NOT NULL,
            `username` varchar(50) NOT NULL,
            `password` varchar(50) NOT NULL,
            `rol` varchar(45) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `users`
            --

            INSERT INTO `users` (`user_id`, `username`, `password`, `rol`) VALUES
            (1, 'webadmin', 'admin', 'admin'),
            (2, 'user_test', '123456', 'normaluser');

            --
            -- Índices para tablas volcadas
            --

            --
            -- Indices de la tabla `discos`
            --
            ALTER TABLE `discos`
            ADD PRIMARY KEY (`album_id`);

            --
            -- Indices de la tabla `reviews`
            --
            ALTER TABLE `reviews`
            ADD PRIMARY KEY (`review_id`),
            ADD KEY `user_id` (`user_id`),
            ADD KEY `album_id` (`album_id`);

            --
            -- Indices de la tabla `users`
            --
            ALTER TABLE `users`
            ADD PRIMARY KEY (`user_id`);

            --
            -- AUTO_INCREMENT de las tablas volcadas
            --

            --
            -- AUTO_INCREMENT de la tabla `discos`
            --
            ALTER TABLE `discos`
            MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

            --
            -- AUTO_INCREMENT de la tabla `reviews`
            --
            ALTER TABLE `reviews`
            MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

            --
            -- AUTO_INCREMENT de la tabla `users`
            --
            ALTER TABLE `users`
            MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

            --
            -- Restricciones para tablas volcadas
            --

            --
            -- Filtros para la tabla `reviews`
            --
            ALTER TABLE `reviews`
            ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
            ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `discos` (`album_id`);
            COMMIT;
            END;
            $this->db->query($sql);
        }
    }
}