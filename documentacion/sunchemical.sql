create table if not exists migrations
(
    id        serial       not null
        constraint migrations_pkey
            primary key,
    migration varchar(255) not null,
    batch     integer      not null
);

create table if not exists roles
(
    id         bigserial    not null
        constraint roles_pkey
            primary key,
    nombre     varchar(255) not null
        constraint roles_nombre_unique
            unique,
    created_at timestamp(0),
    updated_at timestamp(0)
);

create table if not exists estado_empleado
(
    id         bigserial    not null
        constraint estado_empleado_pkey
            primary key,
    nombre     varchar(255) not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

create table if not exists usuarios
(
    id         bigserial    not null
        constraint usuarios_pkey
            primary key,
    usuario    varchar(255) not null,
    clave      varchar(255) not null,
    api_token  varchar(50),
    roles_id   bigint       not null
        constraint usuarios_roles_id_foreign
            references roles,
    created_at timestamp(0),
    updated_at timestamp(0)
);

create table if not exists empleados
(
    id                 bigserial    not null
        constraint empleados_pkey
            primary key,
    nombre             varchar(255) not null,
    apellido           varchar(255) not null,
    estado_empleado_id bigint       not null
        constraint empleados_estado_empleado_id_foreign
            references estado_empleado,
    usuario_id         bigint       not null
        constraint empleados_usuario_id_unique
            unique
        constraint empleados_usuario_id_foreign
            references usuarios,
    direccion          varchar(240) not null,
    created_at         timestamp(0),
    updated_at         timestamp(0)
);

create table if not exists correos
(
    id           bigserial not null
        constraint correos_pkey
            primary key,
    empleados_id bigint    not null
        constraint correos_empleados_id_foreign
            references empleados,
    created_at   timestamp(0),
    updated_at   timestamp(0)
);

create table if not exists profesiones
(
    id         bigserial    not null
        constraint profesiones_pkey
            primary key,
    nombre     varchar(255) not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

create table if not exists preguntas
(
    id           bigserial    not null
        constraint preguntas_pkey
            primary key,
    respuesta    varchar(240) not null,
    empleados_id bigint       not null
        constraint preguntas_empleados_id_foreign
            references empleados,
    created_at   timestamp(0),
    updated_at   timestamp(0)
);

create table if not exists empleados_profesiones
(
    empleados_id   bigint not null
        constraint empleados_profesiones_empleados_id_foreign
            references empleados,
    profesiones_id bigint not null
        constraint empleados_profesiones_profesiones_id_foreign
            references profesiones,
    created_at     timestamp(0),
    updated_at     timestamp(0)
);

create table if not exists clientes
(
    id         bigserial    not null
        constraint clientes_pkey
            primary key,
    nombre     varchar(255) not null,
    direccion  varchar(255) not null,
    correo     varchar(300) not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

create table if not exists tipos_reclamos
(
    id         bigserial    not null
        constraint tipos_reclamos_pkey
            primary key,
    nombre     varchar(255) not null,
    created_at timestamp(0),
    updated_at timestamp(0)
);

create table if not exists reclamos
(
    id                bigserial    not null
        constraint reclamos_pkey
            primary key,
    mensaje           varchar(250) not null,
    created_at        timestamp(0),
    updated_at        timestamp(0),
    tipos_reclamos_id bigint       not null
        constraint reclamos_tipos_reclamos_id_foreign
            references tipos_reclamos,
    clientes_id       bigint       not null
        constraint reclamos_clientes_id_foreign
            references clientes
);

create table if not exists propuestas
(
    id           bigserial    not null
        constraint propuestas_pkey
            primary key,
    propuesta    varchar(400) not null,
    estado       boolean      not null,
    created_at   timestamp(0),
    updated_at   timestamp(0),
    reclamos_id  bigint       not null
        constraint propuestas_reclamos_id_foreign
            references reclamos,
    empleados_id bigint       not null
        constraint propuestas_empleados_id_foreign
            references empleados
);

create table if not exists analisis
(
    id            bigserial    not null
        constraint analisis_pkey
            primary key,
    solucion      varchar(250) not null,
    propuestas_id bigint       not null
        constraint analisis_propuestas_id_foreign
            references propuestas,
    empleados_id  bigint       not null
        constraint analisis_empleados_id_foreign
            references empleados,
    created_at    timestamp(0),
    updated_at    timestamp(0)
);

create table if not exists empresa
(
    id                  bigserial    not null
        constraint empresa_pkey
            primary key,
    nit                 varchar(20)  not null,
    nombre              varchar(100) not null,
    correo              varchar(300) not null,
    representante_legal varchar(45)  not null,
    clave               varchar(100) not null,
    fecha_creada        date         not null
);


