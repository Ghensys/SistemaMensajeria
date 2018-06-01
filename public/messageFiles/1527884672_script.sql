--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3
-- Dumped by pg_dump version 10.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: communication_receivers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.communication_receivers (
    id integer NOT NULL,
    communication_id integer NOT NULL,
    user_id integer NOT NULL,
    user_receiver_id integer NOT NULL,
    content character varying(3000) NOT NULL,
    doc_file character varying(255),
    status_communication_id integer NOT NULL,
    read timestamp(0) without time zone,
    priority_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.communication_receivers OWNER TO postgres;

--
-- Name: communication_receivers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.communication_receivers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.communication_receivers_id_seq OWNER TO postgres;

--
-- Name: communication_receivers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.communication_receivers_id_seq OWNED BY public.communication_receivers.id;


--
-- Name: communication_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.communication_types (
    id integer NOT NULL,
    description_communication_type character varying(50) NOT NULL,
    reply_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.communication_types OWNER TO postgres;

--
-- Name: communication_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.communication_types_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.communication_types_id_seq OWNER TO postgres;

--
-- Name: communication_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.communication_types_id_seq OWNED BY public.communication_types.id;


--
-- Name: communications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.communications (
    id integer NOT NULL,
    communication_type_id integer NOT NULL,
    user_id integer NOT NULL,
    title character varying(100) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.communications OWNER TO postgres;

--
-- Name: communications_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.communications_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.communications_id_seq OWNER TO postgres;

--
-- Name: communications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.communications_id_seq OWNED BY public.communications.id;


--
-- Name: departments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.departments (
    id integer NOT NULL,
    description_department character varying(30) NOT NULL,
    management_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.departments OWNER TO postgres;

--
-- Name: departments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.departments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departments_id_seq OWNER TO postgres;

--
-- Name: departments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.departments_id_seq OWNED BY public.departments.id;


--
-- Name: institutions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.institutions (
    id integer NOT NULL,
    description_institution character varying(30) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.institutions OWNER TO postgres;

--
-- Name: institutions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.institutions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.institutions_id_seq OWNER TO postgres;

--
-- Name: institutions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.institutions_id_seq OWNED BY public.institutions.id;


--
-- Name: managements; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.managements (
    id integer NOT NULL,
    description_management character varying(30) NOT NULL,
    institution_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.managements OWNER TO postgres;

--
-- Name: managements_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.managements_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.managements_id_seq OWNER TO postgres;

--
-- Name: managements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.managements_id_seq OWNED BY public.managements.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- Name: priorities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.priorities (
    id integer NOT NULL,
    description_priority character varying(30) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.priorities OWNER TO postgres;

--
-- Name: priorities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.priorities_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.priorities_id_seq OWNER TO postgres;

--
-- Name: priorities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.priorities_id_seq OWNED BY public.priorities.id;


--
-- Name: replies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.replies (
    id integer NOT NULL,
    description_reply character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.replies OWNER TO postgres;

--
-- Name: replies_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.replies_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.replies_id_seq OWNER TO postgres;

--
-- Name: replies_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.replies_id_seq OWNED BY public.replies.id;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id integer NOT NULL,
    description_role character varying(20) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: status_communications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_communications (
    id integer NOT NULL,
    description_status_communication character varying(40) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.status_communications OWNER TO postgres;

--
-- Name: status_communications_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.status_communications_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.status_communications_id_seq OWNER TO postgres;

--
-- Name: status_communications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_communications_id_seq OWNED BY public.status_communications.id;


--
-- Name: status_tasks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status_tasks (
    id integer NOT NULL,
    description_status_task character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.status_tasks OWNER TO postgres;

--
-- Name: status_tasks_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.status_tasks_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.status_tasks_id_seq OWNER TO postgres;

--
-- Name: status_tasks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.status_tasks_id_seq OWNED BY public.status_tasks.id;


--
-- Name: tasks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tasks (
    id integer NOT NULL,
    communication_id integer NOT NULL,
    communication_receiver_id integer NOT NULL,
    from_id integer NOT NULL,
    to_id integer NOT NULL,
    status_task_id integer NOT NULL,
    comment_task character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tasks OWNER TO postgres;

--
-- Name: tasks_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tasks_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tasks_id_seq OWNER TO postgres;

--
-- Name: tasks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tasks_id_seq OWNED BY public.tasks.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    institution_id integer NOT NULL,
    management_id integer NOT NULL,
    department_id integer NOT NULL,
    role_id integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: communication_receivers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_receivers ALTER COLUMN id SET DEFAULT nextval('public.communication_receivers_id_seq'::regclass);


--
-- Name: communication_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_types ALTER COLUMN id SET DEFAULT nextval('public.communication_types_id_seq'::regclass);


--
-- Name: communications id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communications ALTER COLUMN id SET DEFAULT nextval('public.communications_id_seq'::regclass);


--
-- Name: departments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departments ALTER COLUMN id SET DEFAULT nextval('public.departments_id_seq'::regclass);


--
-- Name: institutions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.institutions ALTER COLUMN id SET DEFAULT nextval('public.institutions_id_seq'::regclass);


--
-- Name: managements id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.managements ALTER COLUMN id SET DEFAULT nextval('public.managements_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: priorities id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.priorities ALTER COLUMN id SET DEFAULT nextval('public.priorities_id_seq'::regclass);


--
-- Name: replies id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.replies ALTER COLUMN id SET DEFAULT nextval('public.replies_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: status_communications id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_communications ALTER COLUMN id SET DEFAULT nextval('public.status_communications_id_seq'::regclass);


--
-- Name: status_tasks id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_tasks ALTER COLUMN id SET DEFAULT nextval('public.status_tasks_id_seq'::regclass);


--
-- Name: tasks id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tasks ALTER COLUMN id SET DEFAULT nextval('public.tasks_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: communication_receivers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.communication_receivers (id, communication_id, user_id, user_receiver_id, content, doc_file, status_communication_id, read, priority_id, created_at, updated_at) FROM stdin;
1	1	2	1	Contenido testing jgkfdjgfkgd	\N	2	2018-05-08 15:51:52	0	2018-05-08 15:51:26	2018-05-08 15:51:52
2	1	1	2	respuesta de prueba para sistema	\N	2	2018-05-09 12:02:20	0	2018-05-08 15:52:51	2018-05-09 12:02:20
4	1	1	2	sdfasdgfasdfasdfsdffsdf	\N	1	\N	0	2018-05-09 12:02:29	2018-05-09 12:02:29
5	3	2	2	dfssdfdsafdsafdsfdsdsfsadfdsfsddsfafsdffsd fsa	\N	1	\N	0	2018-05-09 12:03:12	2018-05-09 12:03:12
3	2	2	1	fdfsgvfdgsdfdsfsdfsd	\N	2	2018-05-09 12:03:17	0	2018-05-09 12:01:12	2018-05-09 12:03:17
\.


--
-- Data for Name: communication_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.communication_types (id, description_communication_type, reply_id, created_at, updated_at) FROM stdin;
1	Memo	2	2018-05-08 15:50:45	2018-05-08 15:50:45
2	Solicitud	1	2018-05-08 15:50:45	2018-05-08 15:50:45
3	Soporte Tecnico	1	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: communications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.communications (id, communication_type_id, user_id, title, created_at, updated_at) FROM stdin;
1	2	2	Solicitud Title	2018-05-08 15:51:26	2018-05-08 15:51:26
2	3	2	fdgfdgddsf	2018-05-09 12:01:12	2018-05-09 12:01:12
3	2	2	fsdfsdfsdffdsfsdfsadfsdfsd	2018-05-09 12:03:12	2018-05-09 12:03:12
\.


--
-- Data for Name: departments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.departments (id, description_department, management_id, created_at, updated_at) FROM stdin;
1	Sistemas	1	2018-05-08 15:50:45	2018-05-08 15:50:45
2	Servidores	1	2018-05-08 15:50:45	2018-05-08 15:50:45
3	Soporte Tecnico	1	2018-05-08 15:50:45	2018-05-08 15:50:45
4	Bienestar Social	2	2018-05-08 15:50:45	2018-05-08 15:50:45
5	Ingresos	2	2018-05-08 15:50:45	2018-05-08 15:50:45
6	Caja de Ahorro	2	2018-05-08 15:50:45	2018-05-08 15:50:45
7	Bienes	3	2018-05-08 15:50:45	2018-05-08 15:50:45
8	Desincorporacion	3	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: institutions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.institutions (id, description_institution, created_at, updated_at) FROM stdin;
1	CONAPDIS	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: managements; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.managements (id, description_management, institution_id, created_at, updated_at) FROM stdin;
1	Tecnología	1	2018-05-08 15:50:45	2018-05-08 15:50:45
2	Talento Humano	1	2018-05-08 15:50:45	2018-05-08 15:50:45
3	Bienes Nacionales	1	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
584	2014_10_12_100000_create_password_resets_table	1
585	2018_02_27_124551_create_institutions_table	1
586	2018_02_27_124600_create_managements_table	1
587	2018_02_27_124613_create_departments_table	1
588	2018_02_27_124641_create_replies_table	1
589	2018_02_27_124642_create_communication_types_table	1
590	2018_02_27_124742_create_priorities_table	1
591	2018_02_27_125844_create_roles_table	1
592	2018_02_27_125845_create_users_table	1
593	2018_02_27_130722_create_status_communications_table	1
594	2018_02_27_135221_create_communications_table	1
595	2018_03_02_201210_create_communication_receivers_table	1
596	2018_03_05_133449_create_status_tasks_table	1
597	2018_03_05_133523_create_tasks_table	1
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: priorities; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.priorities (id, description_priority, created_at, updated_at) FROM stdin;
0	Sin Asignar	2018-05-08 15:50:45	2018-05-08 15:50:45
1	Normal	2018-05-08 15:50:45	2018-05-08 15:50:45
2	Urgente	2018-05-08 15:50:45	2018-05-08 15:50:45
3	Baja	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: replies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.replies (id, description_reply, created_at, updated_at) FROM stdin;
1	Si	2018-05-08 15:50:45	2018-05-08 15:50:45
2	No	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id, description_role, created_at, updated_at) FROM stdin;
0	Admin	2018-05-08 15:50:45	2018-05-08 15:50:45
1	Presidencia	2018-05-08 15:50:45	2018-05-08 15:50:45
2	Gerente	2018-05-08 15:50:45	2018-05-08 15:50:45
3	Coordinador	2018-05-08 15:50:45	2018-05-08 15:50:45
4	Analista	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: status_communications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status_communications (id, description_status_communication, created_at, updated_at) FROM stdin;
1	Sin leer	2018-05-08 15:50:45	2018-05-08 15:50:45
2	Aperturado	2018-05-08 15:50:45	2018-05-08 15:50:45
3	Respondido	2018-05-08 15:50:45	2018-05-08 15:50:45
4	Respuesta Leída	2018-05-08 15:50:45	2018-05-08 15:50:45
5	Cancelada	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: status_tasks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.status_tasks (id, description_status_task, created_at, updated_at) FROM stdin;
1	Sin leer	2018-05-08 15:50:45	2018-05-08 15:50:45
2	En proceso	2018-05-08 15:50:45	2018-05-08 15:50:45
3	Finalizada	2018-05-08 15:50:45	2018-05-08 15:50:45
4	Cancelada	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Data for Name: tasks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tasks (id, communication_id, communication_receiver_id, from_id, to_id, status_task_id, comment_task, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, password, institution_id, management_id, department_id, role_id, remember_token, created_at, updated_at) FROM stdin;
3	Yancarlos Rivas	yrivas@conapdis.gob.ve	$2y$10$HGENhKMYMLibSrNS9SHBD.jNG/.tkIalw52ypzyBQj31TKStKSp96	1	1	1	2	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
4	Gianvel Velandia	gvelandia@conapdis.gob.ve	$2y$10$IWSuotBviN.yba/q81r2R.oOr06B0V3OCcVYoVFrVtR.rjIx95ogO	1	1	3	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
5	Presidencia	presidencia@conapdis.gob.ve	$2y$10$w1z7t/l1tqBhb6/x2ZIqMuHTryy/h6ZuZG612unsmmNt4tWwOb6b2	1	2	4	1	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
6	Gerente	gerente@conapdis.gob.ve	$2y$10$yE2Y4CGro5i1/Ytm7P3HjukZ2tJmTUAUtnW9qFbUwKrwTzMtt7h4S	1	1	7	2	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
7	Coordinador	coordinador@conapdis.gob.ve	$2y$10$SI92ZHjLvfpQP88U3mCUq.uqEGutm0CTzbyEpesi2ulVNhBqsbOHS	1	3	4	3	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
8	Analista	analista@conapdis.gob.ve	$2y$10$5k2Y/UdzM/XUFhh5PImeVuhCF1rWbsOMmAqv6OxgEjXt2HXXnHCoG	1	1	4	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
9	juan Perez Sistemas 1	jperezs1@conapdis.gob.ve	$2y$10$g40oWdV60XjwQnkvfyxGKu6oto6cj54lFx9Cx1hxPgePVFU6Z4W8m	1	1	1	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
10	juan Perez Sistemas 2	jperezs2@conapdis.gob.ve	$2y$10$Y9K9qSAdUmU7Ig2qbIzViOaR6e8VL3TCmUq5rq70e/EDQbvrH/eTu	1	1	1	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
11	juan Perez Sistemas 3	jperezs3@conapdis.gob.ve	$2y$10$rneUiVPL/v0YfNJUVpwcYutyx9AvgM.QqPNPJHMP8o0.HJct4qdWq	1	1	1	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
12	juan Perez Sistemas 4	jperezs4@conapdis.gob.ve	$2y$10$K2neOr6nMnYbKZl/V8gwr.1C9eTgSpsf1uKiYYdhz8vkfno7Hm4Q6	1	1	1	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
13	juan Perez Sistemas 5	jperezs5@conapdis.gob.ve	$2y$10$cQVVYcWmnUmhx2F0CRlaxePwur6VMzVoFGd0sl6TAFpulNpd7nrE2	1	1	1	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
14	juan Perez Servidores 2	jperezss2@conapdis.gob.ve	$2y$10$kORJqZsPIP0Ezou4e7rFc.1JbuJMGQycklx0bO4H4rYDCDzMDlFbK	1	1	2	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
15	juan Perez Servidores 3	jperezss3@conapdis.gob.ve	$2y$10$bm6CFjq7UR/n4XedQIGkF.zLwQRAOYhmLM2FdgrmikwlrBaaiRAim	1	1	2	4	\N	2018-05-08 15:50:46	2018-05-08 15:50:46
16	juan Perez Servidores 4	jperezss4@conapdis.gob.ve	$2y$10$PqopR0itm3rhomKJJ1c8BeBDvIGLBHs.Rz7ULrg3x4/oajUU7coxq	1	1	2	4	\N	2018-05-08 15:50:47	2018-05-08 15:50:47
2	Ghensys Valero	gvalero@conapdis.gob.ve	$2y$10$eoY6eRkipFdxrh5VWOdaUeg9LR2UIaSAexdu4un6XvWtZ5fMx6iHG	1	1	1	0	xAPBGnKWSopEyss4375sPj5f9SY9BauxrOMNbdrXqbLvT0uP0VfeFnHcbKve	2018-05-08 15:50:45	2018-05-08 15:50:45
1	Admin	admin@conapdis.gob.ve	$2y$10$B/I90GHSa0ZLO1.WNXJdmeu1YXsPCLTfENbkF66yJ1sWWc5T7qZdW	1	1	1	0	gkQItb2p9ip4n5F3AAnp7Y94ppgONPFlg97bKKCtsb66HurpGqfCGPFciALc	2018-05-08 15:50:45	2018-05-08 15:50:45
\.


--
-- Name: communication_receivers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.communication_receivers_id_seq', 5, true);


--
-- Name: communication_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.communication_types_id_seq', 3, true);


--
-- Name: communications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.communications_id_seq', 3, true);


--
-- Name: departments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.departments_id_seq', 8, true);


--
-- Name: institutions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.institutions_id_seq', 1, true);


--
-- Name: managements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.managements_id_seq', 3, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 597, true);


--
-- Name: priorities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.priorities_id_seq', 3, true);


--
-- Name: replies_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.replies_id_seq', 2, true);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 1, false);


--
-- Name: status_communications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_communications_id_seq', 5, true);


--
-- Name: status_tasks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.status_tasks_id_seq', 4, true);


--
-- Name: tasks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tasks_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 16, true);


--
-- Name: communication_receivers communication_receivers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_receivers
    ADD CONSTRAINT communication_receivers_pkey PRIMARY KEY (id);


--
-- Name: communication_types communication_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_types
    ADD CONSTRAINT communication_types_pkey PRIMARY KEY (id);


--
-- Name: communications communications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communications
    ADD CONSTRAINT communications_pkey PRIMARY KEY (id);


--
-- Name: departments departments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departments
    ADD CONSTRAINT departments_pkey PRIMARY KEY (id);


--
-- Name: institutions institutions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.institutions
    ADD CONSTRAINT institutions_pkey PRIMARY KEY (id);


--
-- Name: managements managements_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.managements
    ADD CONSTRAINT managements_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: priorities priorities_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.priorities
    ADD CONSTRAINT priorities_pkey PRIMARY KEY (id);


--
-- Name: replies replies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.replies
    ADD CONSTRAINT replies_pkey PRIMARY KEY (id);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: status_communications status_communications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_communications
    ADD CONSTRAINT status_communications_pkey PRIMARY KEY (id);


--
-- Name: status_tasks status_tasks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.status_tasks
    ADD CONSTRAINT status_tasks_pkey PRIMARY KEY (id);


--
-- Name: tasks tasks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tasks
    ADD CONSTRAINT tasks_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: communication_receivers communication_receivers_communication_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_receivers
    ADD CONSTRAINT communication_receivers_communication_id_foreign FOREIGN KEY (communication_id) REFERENCES public.communications(id);


--
-- Name: communication_receivers communication_receivers_priority_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_receivers
    ADD CONSTRAINT communication_receivers_priority_id_foreign FOREIGN KEY (priority_id) REFERENCES public.priorities(id);


--
-- Name: communication_receivers communication_receivers_status_communication_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_receivers
    ADD CONSTRAINT communication_receivers_status_communication_id_foreign FOREIGN KEY (status_communication_id) REFERENCES public.status_communications(id);


--
-- Name: communication_receivers communication_receivers_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_receivers
    ADD CONSTRAINT communication_receivers_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: communication_receivers communication_receivers_user_receiver_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_receivers
    ADD CONSTRAINT communication_receivers_user_receiver_id_foreign FOREIGN KEY (user_receiver_id) REFERENCES public.users(id);


--
-- Name: communication_types communication_types_reply_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communication_types
    ADD CONSTRAINT communication_types_reply_id_foreign FOREIGN KEY (reply_id) REFERENCES public.replies(id);


--
-- Name: communications communications_communication_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communications
    ADD CONSTRAINT communications_communication_type_id_foreign FOREIGN KEY (communication_type_id) REFERENCES public.communication_types(id);


--
-- Name: communications communications_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communications
    ADD CONSTRAINT communications_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: departments departments_management_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departments
    ADD CONSTRAINT departments_management_id_foreign FOREIGN KEY (management_id) REFERENCES public.managements(id);


--
-- Name: managements managements_institution_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.managements
    ADD CONSTRAINT managements_institution_id_foreign FOREIGN KEY (institution_id) REFERENCES public.institutions(id);


--
-- Name: tasks tasks_communication_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tasks
    ADD CONSTRAINT tasks_communication_id_foreign FOREIGN KEY (communication_id) REFERENCES public.communications(id);


--
-- Name: tasks tasks_communication_receiver_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tasks
    ADD CONSTRAINT tasks_communication_receiver_id_foreign FOREIGN KEY (communication_receiver_id) REFERENCES public.communication_receivers(id);


--
-- Name: tasks tasks_from_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tasks
    ADD CONSTRAINT tasks_from_id_foreign FOREIGN KEY (from_id) REFERENCES public.users(id);


--
-- Name: tasks tasks_status_task_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tasks
    ADD CONSTRAINT tasks_status_task_id_foreign FOREIGN KEY (status_task_id) REFERENCES public.status_tasks(id);


--
-- Name: tasks tasks_to_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tasks
    ADD CONSTRAINT tasks_to_id_foreign FOREIGN KEY (to_id) REFERENCES public.users(id);


--
-- Name: users users_department_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_department_id_foreign FOREIGN KEY (department_id) REFERENCES public.departments(id);


--
-- Name: users users_institution_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_institution_id_foreign FOREIGN KEY (institution_id) REFERENCES public.institutions(id);


--
-- Name: users users_management_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_management_id_foreign FOREIGN KEY (management_id) REFERENCES public.managements(id);


--
-- Name: users users_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id);


--
-- PostgreSQL database dump complete
--

