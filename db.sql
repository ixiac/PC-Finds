PGDMP                         }            pcfinds    15.10    15.10                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                        0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            !           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            "           1262    16475    pcfinds    DATABASE     �   CREATE DATABASE pcfinds WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE pcfinds;
                postgres    false            �            1259    16476    account    TABLE     (  CREATE TABLE public.account (
    id bigint NOT NULL,
    username text,
    password text,
    role smallint,
    first_name text,
    last_name text,
    email text,
    gender smallint,
    contact_number text,
    address text,
    date_created timestamp without time zone,
    image text
);
    DROP TABLE public.account;
       public         heap    postgres    false            �            1259    16507    cart    TABLE     `   CREATE TABLE public.cart (
    cart_id bigint NOT NULL,
    id bigint,
    product_id bigint
);
    DROP TABLE public.cart;
       public         heap    postgres    false            �            1259    16483    category    TABLE     Z   CREATE TABLE public.category (
    category_id bigint NOT NULL,
    category_name text
);
    DROP TABLE public.category;
       public         heap    postgres    false            �            1259    16522    order_history    TABLE     �   CREATE TABLE public.order_history (
    order_history_id bigint NOT NULL,
    date_order_history timestamp without time zone,
    total_amount bigint,
    order_status smallint,
    shipping_address text
);
 !   DROP TABLE public.order_history;
       public         heap    postgres    false            �            1259    16529 
   order_item    TABLE     �   CREATE TABLE public.order_item (
    item_id bigint NOT NULL,
    quantity bigint,
    price bigint,
    subtotal bigint,
    order_history_id bigint,
    product_id bigint
);
    DROP TABLE public.order_item;
       public         heap    postgres    false            �            1259    16490    product    TABLE     #  CREATE TABLE public.product (
    product_id bigint NOT NULL,
    product_name text,
    quantity bigint,
    retail_price bigint,
    selling_price bigint,
    date_added timestamp without time zone,
    date_restocked timestamp without time zone,
    category_id bigint,
    image text
);
    DROP TABLE public.product;
       public         heap    postgres    false                      0    16476    account 
   TABLE DATA           �   COPY public.account (id, username, password, role, first_name, last_name, email, gender, contact_number, address, date_created, image) FROM stdin;
    public          postgres    false    214   �                 0    16507    cart 
   TABLE DATA           7   COPY public.cart (cart_id, id, product_id) FROM stdin;
    public          postgres    false    217   �                 0    16483    category 
   TABLE DATA           >   COPY public.category (category_id, category_name) FROM stdin;
    public          postgres    false    215   �                 0    16522    order_history 
   TABLE DATA           {   COPY public.order_history (order_history_id, date_order_history, total_amount, order_status, shipping_address) FROM stdin;
    public          postgres    false    218                     0    16529 
   order_item 
   TABLE DATA           f   COPY public.order_item (item_id, quantity, price, subtotal, order_history_id, product_id) FROM stdin;
    public          postgres    false    219   )                  0    16490    product 
   TABLE DATA           �   COPY public.product (product_id, product_name, quantity, retail_price, selling_price, date_added, date_restocked, category_id, image) FROM stdin;
    public          postgres    false    216   F        y           2606    16482    account account_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.account DROP CONSTRAINT account_pkey;
       public            postgres    false    214                       2606    16511    cart cart_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.cart
    ADD CONSTRAINT cart_pkey PRIMARY KEY (cart_id);
 8   ALTER TABLE ONLY public.cart DROP CONSTRAINT cart_pkey;
       public            postgres    false    217            {           2606    16489    category category_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pkey PRIMARY KEY (category_id);
 @   ALTER TABLE ONLY public.category DROP CONSTRAINT category_pkey;
       public            postgres    false    215            �           2606    16528     order_history order_history_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.order_history
    ADD CONSTRAINT order_history_pkey PRIMARY KEY (order_history_id);
 J   ALTER TABLE ONLY public.order_history DROP CONSTRAINT order_history_pkey;
       public            postgres    false    218            �           2606    16533    order_item order_item_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.order_item
    ADD CONSTRAINT order_item_pkey PRIMARY KEY (item_id);
 D   ALTER TABLE ONLY public.order_item DROP CONSTRAINT order_item_pkey;
       public            postgres    false    219            }           2606    16496    product product_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (product_id);
 >   ALTER TABLE ONLY public.product DROP CONSTRAINT product_pkey;
       public            postgres    false    216            �           2606    16497    product category_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.product
    ADD CONSTRAINT category_id FOREIGN KEY (category_id) REFERENCES public.category(category_id);
 =   ALTER TABLE ONLY public.product DROP CONSTRAINT category_id;
       public          postgres    false    215    216    3195            �           2606    16512    cart id    FK CONSTRAINT     c   ALTER TABLE ONLY public.cart
    ADD CONSTRAINT id FOREIGN KEY (id) REFERENCES public.account(id);
 1   ALTER TABLE ONLY public.cart DROP CONSTRAINT id;
       public          postgres    false    214    217    3193            �           2606    16534    order_item order_history_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.order_item
    ADD CONSTRAINT order_history_id FOREIGN KEY (order_history_id) REFERENCES public.order_history(order_history_id);
 E   ALTER TABLE ONLY public.order_item DROP CONSTRAINT order_history_id;
       public          postgres    false    3201    218    219            �           2606    16517    cart product_id    FK CONSTRAINT     {   ALTER TABLE ONLY public.cart
    ADD CONSTRAINT product_id FOREIGN KEY (product_id) REFERENCES public.product(product_id);
 9   ALTER TABLE ONLY public.cart DROP CONSTRAINT product_id;
       public          postgres    false    216    3197    217            �           2606    16539    order_item product_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.order_item
    ADD CONSTRAINT product_id FOREIGN KEY (product_id) REFERENCES public.product(product_id);
 ?   ALTER TABLE ONLY public.order_item DROP CONSTRAINT product_id;
       public          postgres    false    3197    219    216                  x������ � �            x������ � �            x������ � �            x������ � �            x������ � �            x������ � �     