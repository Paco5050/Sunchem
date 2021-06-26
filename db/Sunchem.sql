PGDMP     ,                    y            sunchemical    13.3    13.3 >               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16585    sunchemical    DATABASE     m   CREATE DATABASE sunchemical WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_El Salvador.1252';
    DROP DATABASE sunchemical;
                postgres    false            �            1259    49394    analisis    TABLE     �   CREATE TABLE public.analisis (
    id_analisis integer NOT NULL,
    id_reclamo integer NOT NULL,
    id_empleado integer NOT NULL,
    fecha_analisis date NOT NULL,
    solucion character varying(250) NOT NULL
);
    DROP TABLE public.analisis;
       public         heap    postgres    false            �            1259    49392    analisis_id_analisis_seq    SEQUENCE     �   ALTER TABLE public.analisis ALTER COLUMN id_analisis ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.analisis_id_analisis_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    207            �            1259    49368    cliente    TABLE     �   CREATE TABLE public.cliente (
    id_cliente integer NOT NULL,
    nombre_cliente character varying(250) NOT NULL,
    direccion character varying(250) NOT NULL,
    email character varying(100) NOT NULL
);
    DROP TABLE public.cliente;
       public         heap    postgres    false            �            1259    49366    cliente_id_cliente_seq    SEQUENCE     �   ALTER TABLE public.cliente ALTER COLUMN id_cliente ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.cliente_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    201            �            1259    49376    empleado    TABLE       CREATE TABLE public.empleado (
    id_empleado integer NOT NULL,
    nombre_empleado character varying(150) NOT NULL,
    profesion character varying(80) NOT NULL,
    direccion character varying(250) NOT NULL,
    email character varying(100) NOT NULL,
    usuario character varying(10) NOT NULL,
    clave character varying(750) NOT NULL,
    id_tipo_empleado integer NOT NULL,
    id_estado_empleado integer NOT NULL,
    id_pregunta1 integer,
    respuesta1 character varying(100),
    id_tipo_usuario integer NOT NULL
);
    DROP TABLE public.empleado;
       public         heap    postgres    false            �            1259    49374    empleado_id_cliente_seq    SEQUENCE     �   ALTER TABLE public.empleado ALTER COLUMN id_empleado ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.empleado_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    203            �            1259    49402    empresa    TABLE     T  CREATE TABLE public.empresa (
    id_empresa integer NOT NULL,
    "contraseña" character varying(100) NOT NULL,
    correo character varying(80) NOT NULL,
    representante_legal character varying(40) NOT NULL,
    nombre_empresa character varying(60) NOT NULL,
    nit character varying(17) NOT NULL,
    fecha_creacion date NOT NULL
);
    DROP TABLE public.empresa;
       public         heap    postgres    false            �            1259    49400    empresa_id_empresa_seq    SEQUENCE     �   ALTER TABLE public.empresa ALTER COLUMN id_empresa ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.empresa_id_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    209            �            1259    49429    estado_empleado    TABLE     �   CREATE TABLE public.estado_empleado (
    id_estado_empleado integer NOT NULL,
    estado_empleado character varying(20) NOT NULL
);
 #   DROP TABLE public.estado_empleado;
       public         heap    postgres    false            �            1259    49427 &   estado_empleado_id_estado_empleado_seq    SEQUENCE        ALTER TABLE public.estado_empleado ALTER COLUMN id_estado_empleado ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.estado_empleado_id_estado_empleado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    215            �            1259    65803 	   preguntas    TABLE     s   CREATE TABLE public.preguntas (
    id_preguntas integer NOT NULL,
    preguntas character varying(80) NOT NULL
);
    DROP TABLE public.preguntas;
       public         heap    postgres    false            �            1259    65801    preguntas_id_preguntas_seq    SEQUENCE     �   ALTER TABLE public.preguntas ALTER COLUMN id_preguntas ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.preguntas_id_preguntas_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    219            �            1259    49389    reclamo    TABLE     �   CREATE TABLE public.reclamo (
    id_reclamo integer NOT NULL,
    id_cliente integer NOT NULL,
    id_tipo_reclamo integer NOT NULL,
    fecha date NOT NULL,
    descripcion character varying(250) NOT NULL
);
    DROP TABLE public.reclamo;
       public         heap    postgres    false            �            1259    49387    reclamo_id_reclamo_seq    SEQUENCE     �   ALTER TABLE public.reclamo ALTER COLUMN id_reclamo ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.reclamo_id_reclamo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    205            �            1259    49424    tipo_empleado    TABLE        CREATE TABLE public.tipo_empleado (
    id_tipo_empleado integer NOT NULL,
    tipo_empleado character varying(20) NOT NULL
);
 !   DROP TABLE public.tipo_empleado;
       public         heap    postgres    false            �            1259    49422 "   tipo_empleado_id_tipo_empleado_seq    SEQUENCE     �   ALTER TABLE public.tipo_empleado ALTER COLUMN id_tipo_empleado ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.tipo_empleado_id_tipo_empleado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    213            �            1259    49434    tipo_reclamo    TABLE     |   CREATE TABLE public.tipo_reclamo (
    id_tipo_reclamo integer NOT NULL,
    tipo_reclamo character varying(20) NOT NULL
);
     DROP TABLE public.tipo_reclamo;
       public         heap    postgres    false            �            1259    49432     tipo_reclamo_id_tipo_reclamo_seq    SEQUENCE     �   ALTER TABLE public.tipo_reclamo ALTER COLUMN id_tipo_reclamo ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.tipo_reclamo_id_tipo_reclamo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    217            �            1259    49419    tipo_usuario    TABLE     |   CREATE TABLE public.tipo_usuario (
    id_tipo_usuario integer NOT NULL,
    tipo_usuario character varying(20) NOT NULL
);
     DROP TABLE public.tipo_usuario;
       public         heap    postgres    false            �            1259    49417     tipo_usuario_id_tipo_usuario_seq    SEQUENCE     �   ALTER TABLE public.tipo_usuario ALTER COLUMN id_tipo_usuario ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.tipo_usuario_id_tipo_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 214783647
    CACHE 1
);
            public          postgres    false    211                       0    49394    analisis 
   TABLE DATA           b   COPY public.analisis (id_analisis, id_reclamo, id_empleado, fecha_analisis, solucion) FROM stdin;
    public          postgres    false    207   YL       �          0    49368    cliente 
   TABLE DATA           O   COPY public.cliente (id_cliente, nombre_cliente, direccion, email) FROM stdin;
    public          postgres    false    201   �L       �          0    49376    empleado 
   TABLE DATA           �   COPY public.empleado (id_empleado, nombre_empleado, profesion, direccion, email, usuario, clave, id_tipo_empleado, id_estado_empleado, id_pregunta1, respuesta1, id_tipo_usuario) FROM stdin;
    public          postgres    false    203   �L                 0    49402    empresa 
   TABLE DATA           ~   COPY public.empresa (id_empresa, "contraseña", correo, representante_legal, nombre_empresa, nit, fecha_creacion) FROM stdin;
    public          postgres    false    209   kM                 0    49429    estado_empleado 
   TABLE DATA           N   COPY public.estado_empleado (id_estado_empleado, estado_empleado) FROM stdin;
    public          postgres    false    215   �M                 0    65803 	   preguntas 
   TABLE DATA           <   COPY public.preguntas (id_preguntas, preguntas) FROM stdin;
    public          postgres    false    219   �M       �          0    49389    reclamo 
   TABLE DATA           ^   COPY public.reclamo (id_reclamo, id_cliente, id_tipo_reclamo, fecha, descripcion) FROM stdin;
    public          postgres    false    205   �M                 0    49424    tipo_empleado 
   TABLE DATA           H   COPY public.tipo_empleado (id_tipo_empleado, tipo_empleado) FROM stdin;
    public          postgres    false    213   N       
          0    49434    tipo_reclamo 
   TABLE DATA           E   COPY public.tipo_reclamo (id_tipo_reclamo, tipo_reclamo) FROM stdin;
    public          postgres    false    217   UN                 0    49419    tipo_usuario 
   TABLE DATA           E   COPY public.tipo_usuario (id_tipo_usuario, tipo_usuario) FROM stdin;
    public          postgres    false    211   �N                  0    0    analisis_id_analisis_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.analisis_id_analisis_seq', 1, true);
          public          postgres    false    206                       0    0    cliente_id_cliente_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.cliente_id_cliente_seq', 1, true);
          public          postgres    false    200                       0    0    empleado_id_cliente_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.empleado_id_cliente_seq', 1, true);
          public          postgres    false    202                       0    0    empresa_id_empresa_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.empresa_id_empresa_seq', 1, false);
          public          postgres    false    208                       0    0 &   estado_empleado_id_estado_empleado_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('public.estado_empleado_id_estado_empleado_seq', 2, true);
          public          postgres    false    214                       0    0    preguntas_id_preguntas_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.preguntas_id_preguntas_seq', 1, true);
          public          postgres    false    218                       0    0    reclamo_id_reclamo_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.reclamo_id_reclamo_seq', 1, true);
          public          postgres    false    204                       0    0 "   tipo_empleado_id_tipo_empleado_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.tipo_empleado_id_tipo_empleado_seq', 2, true);
          public          postgres    false    212                       0    0     tipo_reclamo_id_tipo_reclamo_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.tipo_reclamo_id_tipo_reclamo_seq', 3, true);
          public          postgres    false    216                       0    0     tipo_usuario_id_tipo_usuario_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.tipo_usuario_id_tipo_usuario_seq', 2, true);
          public          postgres    false    210            b           2606    49410    analisis analisis_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.analisis
    ADD CONSTRAINT analisis_pkey PRIMARY KEY (id_analisis);
 @   ALTER TABLE ONLY public.analisis DROP CONSTRAINT analisis_pkey;
       public            postgres    false    207            \           2606    49412    cliente cliente_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id_cliente);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public            postgres    false    201            ^           2606    49408    empleado empleado_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (id_empleado);
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_pkey;
       public            postgres    false    203            d           2606    49406    empresa empresa_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.empresa
    ADD CONSTRAINT empresa_pkey PRIMARY KEY (id_empresa);
 >   ALTER TABLE ONLY public.empresa DROP CONSTRAINT empresa_pkey;
       public            postgres    false    209            j           2606    49469 $   estado_empleado estado_empleado_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.estado_empleado
    ADD CONSTRAINT estado_empleado_pkey PRIMARY KEY (id_estado_empleado);
 N   ALTER TABLE ONLY public.estado_empleado DROP CONSTRAINT estado_empleado_pkey;
       public            postgres    false    215            n           2606    65807    preguntas preguntas_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.preguntas
    ADD CONSTRAINT preguntas_pkey PRIMARY KEY (id_preguntas);
 B   ALTER TABLE ONLY public.preguntas DROP CONSTRAINT preguntas_pkey;
       public            postgres    false    219            `           2606    49416    reclamo reclamo_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.reclamo
    ADD CONSTRAINT reclamo_pkey PRIMARY KEY (id_reclamo);
 >   ALTER TABLE ONLY public.reclamo DROP CONSTRAINT reclamo_pkey;
       public            postgres    false    205            h           2606    49448     tipo_empleado tipo_empleado_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.tipo_empleado
    ADD CONSTRAINT tipo_empleado_pkey PRIMARY KEY (id_tipo_empleado);
 J   ALTER TABLE ONLY public.tipo_empleado DROP CONSTRAINT tipo_empleado_pkey;
       public            postgres    false    213            l           2606    49450    tipo_reclamo tipo_reclamo_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tipo_reclamo
    ADD CONSTRAINT tipo_reclamo_pkey PRIMARY KEY (id_tipo_reclamo);
 H   ALTER TABLE ONLY public.tipo_reclamo DROP CONSTRAINT tipo_reclamo_pkey;
       public            postgres    false    217            f           2606    49452    tipo_usuario tipo_usuario_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tipo_usuario
    ADD CONSTRAINT tipo_usuario_pkey PRIMARY KEY (id_tipo_usuario);
 H   ALTER TABLE ONLY public.tipo_usuario DROP CONSTRAINT tipo_usuario_pkey;
       public            postgres    false    211            s           2606    49475    reclamo fkcliente    FK CONSTRAINT     �   ALTER TABLE ONLY public.reclamo
    ADD CONSTRAINT fkcliente FOREIGN KEY (id_cliente) REFERENCES public.cliente(id_cliente) NOT VALID;
 ;   ALTER TABLE ONLY public.reclamo DROP CONSTRAINT fkcliente;
       public          postgres    false    201    2908    205            u           2606    49437    analisis fkempleado    FK CONSTRAINT     �   ALTER TABLE ONLY public.analisis
    ADD CONSTRAINT fkempleado FOREIGN KEY (id_empleado) REFERENCES public.empleado(id_empleado) NOT VALID;
 =   ALTER TABLE ONLY public.analisis DROP CONSTRAINT fkempleado;
       public          postgres    false    203    2910    207            q           2606    49470    empleado fkestado    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fkestado FOREIGN KEY (id_estado_empleado) REFERENCES public.estado_empleado(id_estado_empleado) NOT VALID;
 ;   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fkestado;
       public          postgres    false    215    203    2922            r           2606    65808    empleado fkpregunta    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fkpregunta FOREIGN KEY (id_pregunta1) REFERENCES public.preguntas(id_preguntas) NOT VALID;
 =   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fkpregunta;
       public          postgres    false    203    2926    219            v           2606    49442    analisis fkreclamo    FK CONSTRAINT     �   ALTER TABLE ONLY public.analisis
    ADD CONSTRAINT fkreclamo FOREIGN KEY (id_reclamo) REFERENCES public.reclamo(id_reclamo) NOT VALID;
 <   ALTER TABLE ONLY public.analisis DROP CONSTRAINT fkreclamo;
       public          postgres    false    205    207    2912            t           2606    49485    reclamo fkreclamo    FK CONSTRAINT     �   ALTER TABLE ONLY public.reclamo
    ADD CONSTRAINT fkreclamo FOREIGN KEY (id_tipo_reclamo) REFERENCES public.tipo_reclamo(id_tipo_reclamo) NOT VALID;
 ;   ALTER TABLE ONLY public.reclamo DROP CONSTRAINT fkreclamo;
       public          postgres    false    205    217    2924            o           2606    49453    empleado fktipoempleado    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fktipoempleado FOREIGN KEY (id_tipo_empleado) REFERENCES public.tipo_empleado(id_tipo_empleado) NOT VALID;
 A   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fktipoempleado;
       public          postgres    false    203    213    2920            p           2606    49463    empleado fktipousuario    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fktipousuario FOREIGN KEY (id_tipo_usuario) REFERENCES public.tipo_usuario(id_tipo_usuario) NOT VALID;
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fktipousuario;
       public          postgres    false    211    2918    203                %   x�3�4B##C]3]#3Nǜ�|���L�=... \e7      �   0   x�3�H,J���/RH���, �2K��-��s3s���s�b���� $�       �   �   x��A�0 ��ۯ��ٜd�-�,!p�u�.�1�d�����}�'�d|j4E/�=A�[d��8���#������|��eq��eku�bP�3V*,�u��s���&[�'�J;�onOcv��z�f��_��HqO�?/�,H            x������ � �            x�3�tL.�,��2���K�0c���� ^��         &   x�3�<�?�4U!9?73%Q�$U!���$ў+F��� ��	�      �   %   x�3�4B##C]3]#3Nǜ�|���L�=... \e7         &   x�3�tL����,.)JL�/�2�tJ,�L������ ���      
   .   x�3�JM�M��)��2�tI-��)M����2�,M�J����� �L.            x�3���/�2�tJ,�L������ =�'     