--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.4
-- Dumped by pg_dump version 9.4.4
-- Started on 2016-05-24 09:35:45 BOT

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 182 (class 3079 OID 11935)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2135 (class 0 OID 0)
-- Dependencies: 182
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 172 (class 1259 OID 391007)
-- Name: administrador; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE administrador (
    cod_administrador character varying(10) NOT NULL,
    nacionalidad character(1) NOT NULL,
    cedula_admin integer NOT NULL,
    nombre_1 character varying(20) NOT NULL,
    nombre_2 character varying(20),
    apellido_1 character varying(20) NOT NULL,
    apellido_2 character varying(20),
    telefono_1 character varying(11) NOT NULL,
    telefono_2 character varying(11),
    cod_user character varying(10) NOT NULL
);


ALTER TABLE administrador OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 391010)
-- Name: egresado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE egresado (
    cod_estudiante character varying(10),
    idioma character varying(25),
    cod_egresado character varying(10) NOT NULL
);


ALTER TABLE egresado OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 391013)
-- Name: estudiante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estudiante (
    cod_estudiante character varying(10) NOT NULL,
    cedula_est integer NOT NULL,
    nacionalidad character(1) NOT NULL,
    nombre_1 character varying(20) NOT NULL,
    nombre_2 character varying(20),
    apellido_1 character varying(20) NOT NULL,
    apellido_2 character varying(20),
    telefono_1 character varying(11) NOT NULL,
    telefono_2 character varying(11),
    direccion character varying(500) NOT NULL,
    lugar_de_trabajo character varying(250),
    cargo character varying(50),
    fecha date NOT NULL,
    cod_user character varying(10) NOT NULL
);


ALTER TABLE estudiante OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 391019)
-- Name: horario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE horario (
    cod_horario integer NOT NULL,
    cod_seccion character varying(10) NOT NULL,
    dia character varying(10) NOT NULL,
    turno character varying(10) NOT NULL,
    hora_inicio time without time zone NOT NULL,
    hora_fin time without time zone NOT NULL,
    aula character varying(10) NOT NULL
);


ALTER TABLE horario OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 391022)
-- Name: horario_cod_horario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE horario_cod_horario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE horario_cod_horario_seq OWNER TO postgres;

--
-- TOC entry 2136 (class 0 OID 0)
-- Dependencies: 176
-- Name: horario_cod_horario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE horario_cod_horario_seq OWNED BY horario.cod_horario;


--
-- TOC entry 177 (class 1259 OID 391024)
-- Name: idioma; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE idioma (
    cod_idioma character varying(10) NOT NULL,
    idioma character varying(20) NOT NULL,
    niveles integer NOT NULL
);


ALTER TABLE idioma OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 391027)
-- Name: inscripcion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inscripcion (
    cod_inscripcion character varying(10) NOT NULL,
    fecha date NOT NULL,
    estado character(1) NOT NULL,
    cod_estudiante character varying(10) NOT NULL,
    deposito character varying(15),
    hora reltime NOT NULL,
    nota real,
    cod_seccion character varying(10),
    activo character(1)
);


ALTER TABLE inscripcion OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 391030)
-- Name: profesor; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE profesor (
    cod_profesor character varying(10) NOT NULL,
    cedula_prof integer NOT NULL,
    nacionalidad character(1) NOT NULL,
    nombre_1 character varying(20) NOT NULL,
    nombre_2 character varying(20),
    apellido_1 character varying(20) NOT NULL,
    apellido_2 character varying(20),
    telefono_1 character varying(11) NOT NULL,
    telefono_2 character varying(11),
    cod_user character varying(10) NOT NULL
);


ALTER TABLE profesor OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 391033)
-- Name: seccion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE seccion (
    cod_seccion character varying(10) NOT NULL,
    cod_idioma character varying(10) NOT NULL,
    nivel integer NOT NULL,
    maximo_de_est integer NOT NULL,
    cod_profesor character varying(10),
    estado character(1)
);


ALTER TABLE seccion OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 391036)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    cod_user character varying(10) NOT NULL,
    nombre_user character varying(20) NOT NULL,
    clave_user character varying(40) NOT NULL,
    correo character varying(150) NOT NULL,
    tipo_user character(1) NOT NULL
);


ALTER TABLE usuario OWNER TO postgres;

--
-- TOC entry 1992 (class 2604 OID 391039)
-- Name: cod_horario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horario ALTER COLUMN cod_horario SET DEFAULT nextval('horario_cod_horario_seq'::regclass);


--
-- TOC entry 1994 (class 2606 OID 391041)
-- Name: administrador_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY administrador
    ADD CONSTRAINT administrador_pk PRIMARY KEY (cod_administrador);


--
-- TOC entry 1996 (class 2606 OID 391043)
-- Name: egresado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY egresado
    ADD CONSTRAINT egresado_pkey PRIMARY KEY (cod_egresado);


--
-- TOC entry 1998 (class 2606 OID 391045)
-- Name: estudiante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_pkey PRIMARY KEY (cod_estudiante);


--
-- TOC entry 2000 (class 2606 OID 391047)
-- Name: horario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY horario
    ADD CONSTRAINT horario_pk PRIMARY KEY (cod_horario);


--
-- TOC entry 2002 (class 2606 OID 391049)
-- Name: idioma_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY idioma
    ADD CONSTRAINT idioma_pk PRIMARY KEY (cod_idioma);


--
-- TOC entry 2004 (class 2606 OID 391051)
-- Name: inscripcion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_pkey PRIMARY KEY (cod_inscripcion);


--
-- TOC entry 2006 (class 2606 OID 391053)
-- Name: profesor_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_pk PRIMARY KEY (cod_profesor);


--
-- TOC entry 2008 (class 2606 OID 391055)
-- Name: seccion_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seccion
    ADD CONSTRAINT seccion_pk PRIMARY KEY (cod_seccion);


--
-- TOC entry 2010 (class 2606 OID 391057)
-- Name: usuario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pk PRIMARY KEY (cod_user);


--
-- TOC entry 2011 (class 2606 OID 391058)
-- Name: administrador_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY administrador
    ADD CONSTRAINT administrador_ibfk_1 FOREIGN KEY (cod_user) REFERENCES usuario(cod_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2012 (class 2606 OID 391063)
-- Name: egresado_cod_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY egresado
    ADD CONSTRAINT egresado_cod_estudiante_fkey FOREIGN KEY (cod_estudiante) REFERENCES estudiante(cod_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2013 (class 2606 OID 391068)
-- Name: estudiante_cod_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_cod_user_fkey FOREIGN KEY (cod_user) REFERENCES usuario(cod_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2014 (class 2606 OID 391073)
-- Name: horario_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horario
    ADD CONSTRAINT horario_ibfk_1 FOREIGN KEY (cod_seccion) REFERENCES seccion(cod_seccion) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2015 (class 2606 OID 391078)
-- Name: inscripcion_cod_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_cod_estudiante_fkey FOREIGN KEY (cod_estudiante) REFERENCES estudiante(cod_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2016 (class 2606 OID 391083)
-- Name: inscripcion_cod_seccion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_cod_seccion_fkey FOREIGN KEY (cod_seccion) REFERENCES seccion(cod_seccion) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2017 (class 2606 OID 391088)
-- Name: profesor_cod_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_cod_user_fkey FOREIGN KEY (cod_user) REFERENCES usuario(cod_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2018 (class 2606 OID 391093)
-- Name: seccion_ibfk_8; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seccion
    ADD CONSTRAINT seccion_ibfk_8 FOREIGN KEY (cod_idioma) REFERENCES idioma(cod_idioma);


--
-- TOC entry 2134 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-05-24 09:35:45 BOT

--
-- PostgreSQL database dump complete
--

