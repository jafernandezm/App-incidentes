--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3 (Debian 16.3-1.pgdg120+1)
-- Dumped by pg_dump version 16.3 (Debian 16.3-1.pgdg120+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: bases; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.bases (
    id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.bases OWNER TO homestead;

--
-- Name: bases_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.bases_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.bases_id_seq OWNER TO homestead;

--
-- Name: bases_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.bases_id_seq OWNED BY public.bases.id;


--
-- Name: dominios__listas; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.dominios__listas (
    id bigint NOT NULL,
    url character varying(255) NOT NULL,
    tipo character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.dominios__listas OWNER TO homestead;

--
-- Name: dominios__listas_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.dominios__listas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.dominios__listas_id_seq OWNER TO homestead;

--
-- Name: dominios__listas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.dominios__listas_id_seq OWNED BY public.dominios__listas.id;


--
-- Name: dorks; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.dorks (
    id bigint NOT NULL,
    dork character varying(255) NOT NULL,
    fecha date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.dorks OWNER TO homestead;

--
-- Name: dorks_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.dorks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.dorks_id_seq OWNER TO homestead;

--
-- Name: dorks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.dorks_id_seq OWNED BY public.dorks.id;


--
-- Name: escaneos; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.escaneos (
    id bigint NOT NULL,
    url character varying(255),
    escaneo_id uuid NOT NULL,
    tipo character varying(255),
    fecha date NOT NULL,
    resultado character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.escaneos OWNER TO homestead;

--
-- Name: escaneos_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.escaneos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.escaneos_id_seq OWNER TO homestead;

--
-- Name: escaneos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.escaneos_id_seq OWNED BY public.escaneos.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO homestead;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO homestead;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: html_infectados; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.html_infectados (
    id bigint NOT NULL,
    html_infectado character varying(255) NOT NULL,
    descripcion text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.html_infectados OWNER TO homestead;

--
-- Name: html_infectados_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.html_infectados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.html_infectados_id_seq OWNER TO homestead;

--
-- Name: html_infectados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.html_infectados_id_seq OWNED BY public.html_infectados.id;


--
-- Name: lista_negras; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.lista_negras (
    id bigint NOT NULL,
    url character varying(255) NOT NULL,
    tipo character varying(255) NOT NULL,
    fecha date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.lista_negras OWNER TO homestead;

--
-- Name: lista_negras_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.lista_negras_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.lista_negras_id_seq OWNER TO homestead;

--
-- Name: lista_negras_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.lista_negras_id_seq OWNED BY public.lista_negras.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO homestead;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO homestead;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO homestead;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO homestead;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_access_tokens_id_seq OWNER TO homestead;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: resultados__escaneos; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.resultados__escaneos (
    id bigint NOT NULL,
    escaneo_id bigint NOT NULL,
    url character varying(255) NOT NULL,
    infectada character varying(255),
    html_infectado json,
    html json,
    redirecciones json,
    detalle text,
    tipo character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.resultados__escaneos OWNER TO homestead;

--
-- Name: resultados__escaneos_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.resultados__escaneos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.resultados__escaneos_id_seq OWNER TO homestead;

--
-- Name: resultados__escaneos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.resultados__escaneos_id_seq OWNED BY public.resultados__escaneos.id;


--
-- Name: sitios; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.sitios (
    id bigint NOT NULL,
    url character varying(255) NOT NULL,
    nombre character varying(255) NOT NULL,
    estado character varying(255) DEFAULT 'limpio'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.sitios OWNER TO homestead;

--
-- Name: sitios_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.sitios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.sitios_id_seq OWNER TO homestead;

--
-- Name: sitios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.sitios_id_seq OWNED BY public.sitios.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: homestead
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO homestead;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: homestead
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO homestead;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: bases id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.bases ALTER COLUMN id SET DEFAULT nextval('public.bases_id_seq'::regclass);


--
-- Name: dominios__listas id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.dominios__listas ALTER COLUMN id SET DEFAULT nextval('public.dominios__listas_id_seq'::regclass);


--
-- Name: dorks id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.dorks ALTER COLUMN id SET DEFAULT nextval('public.dorks_id_seq'::regclass);


--
-- Name: escaneos id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.escaneos ALTER COLUMN id SET DEFAULT nextval('public.escaneos_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: html_infectados id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.html_infectados ALTER COLUMN id SET DEFAULT nextval('public.html_infectados_id_seq'::regclass);


--
-- Name: lista_negras id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.lista_negras ALTER COLUMN id SET DEFAULT nextval('public.lista_negras_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: resultados__escaneos id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.resultados__escaneos ALTER COLUMN id SET DEFAULT nextval('public.resultados__escaneos_id_seq'::regclass);


--
-- Name: sitios id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.sitios ALTER COLUMN id SET DEFAULT nextval('public.sitios_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: bases; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.bases (id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: dominios__listas; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.dominios__listas (id, url, tipo, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: dorks; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.dorks (id, dork, fecha, created_at, updated_at) FROM stdin;
1	site:gob.bo japan	2024-06-22	2024-07-07 03:14:00	2024-07-07 03:14:00
\.


--
-- Data for Name: escaneos; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.escaneos (id, url, escaneo_id, tipo, fecha, resultado, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: html_infectados; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.html_infectados (id, html_infectado, descripcion, created_at, updated_at) FROM stdin;
1	<html lang="ja"	ataque seo japones	2024-07-07 03:14:00	2024-07-07 03:14:00
2	<meta http-equiv="refresh" 	ataque seo japones	2024-07-07 03:14:00	2024-07-07 03:14:00
\.


--
-- Data for Name: lista_negras; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.lista_negras (id, url, tipo, fecha, created_at, updated_at) FROM stdin;
1	https://wjk.hfiiiqkp.shop	ataque seo japones	2024-06-22	2024-07-07 03:14:00	2024-07-07 03:14:00
2	https://ner.arcdycvz.shop	ataque seo japones	2024-06-22	2024-07-07 03:14:00	2024-07-07 03:14:00
3	https://aaj.toirifiy.top	ataque seo japones	2024-06-22	2024-07-07 03:14:00	2024-07-07 03:14:00
4	https://www.umivo.net	ataque seo japones	2024-06-22	2024-07-07 03:14:00	2024-07-07 03:14:00
5	https://ginzo.jp	ataque seo japones	2024-06-22	2024-07-07 03:14:00	2024-07-07 03:14:00
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2024_06_30_214454_create_sitios_table	1
6	2024_06_30_214511_create_dominios__listas_table	1
7	2024_06_30_214518_create_escaneos_table	1
8	2024_06_30_214525_create_html_infectados_table	1
9	2024_06_30_214541_create_resultados__escaneos_table	1
10	2024_06_30_214700_create_bases_table	1
11	2024_06_30_223917_create_dorks_table	1
12	2024_06_30_225916_create_lista_negras_table	1
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: resultados__escaneos; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.resultados__escaneos (id, escaneo_id, url, infectada, html_infectado, html, redirecciones, detalle, tipo, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sitios; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.sitios (id, url, nombre, estado, created_at, updated_at) FROM stdin;
1	https://www.cmt.gob.bo/	Pasivo 1	pasivo	2024-07-07 03:14:00	2024-07-07 03:14:00
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: homestead
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
1	warrior	gonter866@gmail.com	2024-07-07 03:14:00	$2y$10$3wY92h6lrxB1/LZngyam3.hVIF487aNz6AYRVXaqQBxYAUjQ6AYYu	GWtwYiWqjY	2024-07-07 03:14:00	2024-07-07 03:14:00
\.


--
-- Name: bases_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.bases_id_seq', 1, false);


--
-- Name: dominios__listas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.dominios__listas_id_seq', 1, false);


--
-- Name: dorks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.dorks_id_seq', 1, true);


--
-- Name: escaneos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.escaneos_id_seq', 1, false);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: html_infectados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.html_infectados_id_seq', 2, true);


--
-- Name: lista_negras_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.lista_negras_id_seq', 5, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.migrations_id_seq', 12, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: resultados__escaneos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.resultados__escaneos_id_seq', 1, false);


--
-- Name: sitios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.sitios_id_seq', 1, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: homestead
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- Name: bases bases_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.bases
    ADD CONSTRAINT bases_pkey PRIMARY KEY (id);


--
-- Name: dominios__listas dominios__listas_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.dominios__listas
    ADD CONSTRAINT dominios__listas_pkey PRIMARY KEY (id);


--
-- Name: dorks dorks_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.dorks
    ADD CONSTRAINT dorks_pkey PRIMARY KEY (id);


--
-- Name: escaneos escaneos_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.escaneos
    ADD CONSTRAINT escaneos_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: html_infectados html_infectados_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.html_infectados
    ADD CONSTRAINT html_infectados_pkey PRIMARY KEY (id);


--
-- Name: lista_negras lista_negras_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.lista_negras
    ADD CONSTRAINT lista_negras_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: password_resets password_resets_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.password_resets
    ADD CONSTRAINT password_resets_pkey PRIMARY KEY (email);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: resultados__escaneos resultados__escaneos_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.resultados__escaneos
    ADD CONSTRAINT resultados__escaneos_pkey PRIMARY KEY (id);


--
-- Name: sitios sitios_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.sitios
    ADD CONSTRAINT sitios_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: homestead
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: resultados__escaneos resultados__escaneos_escaneo_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: homestead
--

ALTER TABLE ONLY public.resultados__escaneos
    ADD CONSTRAINT resultados__escaneos_escaneo_id_foreign FOREIGN KEY (escaneo_id) REFERENCES public.escaneos(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

