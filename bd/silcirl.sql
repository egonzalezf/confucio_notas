--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
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


ALTER TABLE public.administrador OWNER TO postgres;

--
-- Name: egresado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE egresado (
    cod_estudiante character varying(10),
    idioma character varying(25),
    cod_egresado character varying(10) NOT NULL
);


ALTER TABLE public.egresado OWNER TO postgres;

--
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


ALTER TABLE public.estudiante OWNER TO postgres;

--
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


ALTER TABLE public.horario OWNER TO postgres;

--
-- Name: horario_cod_horario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE horario_cod_horario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.horario_cod_horario_seq OWNER TO postgres;

--
-- Name: horario_cod_horario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE horario_cod_horario_seq OWNED BY horario.cod_horario;


--
-- Name: idioma; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE idioma (
    cod_idioma character varying(10) NOT NULL,
    idioma character varying(20) NOT NULL,
    niveles integer NOT NULL
);


ALTER TABLE public.idioma OWNER TO postgres;

--
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


ALTER TABLE public.inscripcion OWNER TO postgres;

--
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


ALTER TABLE public.profesor OWNER TO postgres;

--
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


ALTER TABLE public.seccion OWNER TO postgres;

--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    cod_user character varying(10) NOT NULL,
    nombre_user character varying(20) NOT NULL,
    clave_user character varying(40) NOT NULL,
    correo character varying(150) NOT NULL,
    tipo_user character(1) NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: cod_horario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horario ALTER COLUMN cod_horario SET DEFAULT nextval('horario_cod_horario_seq'::regclass);


--
-- Data for Name: administrador; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO administrador VALUES ('ffb541a760', 'v', 22563694, 'yoshi', 'rafael', 'urbina', 'hernandez', '04168393111', '04168393111', 'ffb5429864');


--
-- Data for Name: egresado; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: estudiante; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estudiante VALUES ('19162428', 19162428, 'v', 'marco', 'andres', 'maneiro', 'pascuzzo', '02126318806', '04164282457', 'plaza venezuela', 'automotriz', 'tecnico', '1988-04-14', '3af90f4ac0');
INSERT INTO estudiante VALUES ('498805', 498805, 'v', 'maria', 'del valle', 'figueredo', 'diaz', '02127516717', '04140299226', 'colinas de bello monte', 'ama de casa', 'ama de casa', '1934-09-12', '9581b23d22');
INSERT INTO estudiante VALUES ('1277003', 1277003, 'v', 'gladys', ' josefina', 'suarez', 'melendez', '02126329260', '04268123693', 'av. teresa toroRES. SIRACUSA PISO 2 APTO 21 las acacias', 'no trabaja', 'Jubilada', '1940-03-22', '38cd8416e3');
INSERT INTO estudiante VALUES ('1743567', 1743567, 'v', 'flavia', 'miguelina', 'espiniza', 'no', '04126024430', '00000000000', 'av lazo maite edif bolet', 'No trabajo', 'No trabajo', '1937-05-08', '6347ef37c4');
INSERT INTO estudiante VALUES ('2518991', 2518991, 'v', 'Yolanda', 'Josefina', 'Muñoz', 'Muñoz', '02123250699', '04264045700', 'final calle el estanque numero 207 parroquia coche', 'Jubilada', 'Jubilada', '2019-12-15', '3b1ffb755e');
INSERT INTO estudiante VALUES ('2608134', 2608134, 'v', 'Rosalina', 'Rosalina', 'Escalona', 'Mujica', '02125455406', '04164067953', 'av. lecuna, res. royal, piso 11, apto 113, sta rosalia', 'Del hogar', 'Ama de casa', '1949-08-30', '940ff6c3c0');
INSERT INTO estudiante VALUES ('2990891', 2990891, 'v', 'Jose', 'Federico', 'Chirinos', 'Meneses', '02127821514', '04125932698', 'Avenida la Salle, Edificio Merida, 3er piso apto 19, los caobos, caracas', 'no trabaja', 'no posee', '1947-03-05', 'a4771e09a8');
INSERT INTO estudiante VALUES ('3176091', 3176091, 'v', 'Daniel', 'Daniel', 'Leon', 'Arias', '02122837371', '04242120422', 'Av Romulo Gallegos,Edif Las Americas, 6to piso apt 62', 'Jubilado', 'Jubilado', '1943-10-08', '8fee5bde3e');
INSERT INTO estudiante VALUES ('3231059', 3231059, 'v', 'Maria', 'Esperanza', 'Molero', 'Alarcon', '02128844049', '04125770595', 'Avenida victor batista 127, los teques', 'Jubilada', 'Jubilada', '1947-12-18', 'f6be5cc1b0');
INSERT INTO estudiante VALUES ('3400410', 3400410, 'v', 'maricela', 'de jesus', 'reyes', 'rivas', '02127941823', '04129923360', 'av. bolivia ed. ricalex p-11 apartamento 11-b los caobos', 'fogade', 'administracion', '1949-12-22', '9baad9b712');
INSERT INTO estudiante VALUES ('3625060', 3625060, 'v', 'adelaida', 'no posee', 'crespo', 'armas', '02126900668', '04166221969', 'av. atabapo res. atabapo apto 3-c valle abajo caracas ', 'ucv', 'profesora', '1949-07-01', 'd7baa5b962');
INSERT INTO estudiante VALUES ('3662150', 3662150, 'v', 'efrain', 'rene', 'fericelli', 'martinez', '02122417724', '04168091324', 'calle 13, res elizabeth, piso 1, apt 1d, la urbina, caracas', 'Jubilado', 'Jubilado', '1950-02-25', '1e6e0101d5');
INSERT INTO estudiante VALUES ('3714321', 3714321, 'v', 'Hortencia', 'Margarita', 'figueredo', 'figueredo', '02128702137', '04167232978', 'segunda calle laguna de catia nro 51-26 sector los magallanes de catia parroquia sucre,munnicipio libertador, distrito capital', 'mppps', 'receptoria', '1950-12-08', '3290bf5cbc');
INSERT INTO estudiante VALUES ('3790071', 3790071, 'v', 'Pedro', 'Pablo', 'Torres', ' no', '02123414820', '04265126573', 'El Marquez, Los Azulejos Edificio 3 Piso 2 Apartamento C2 Guatire, Estado Miranda', 'no', 'no', '1956-06-29', '771b2c2160');
INSERT INTO estudiante VALUES ('3803226', 3803226, 'v', 'virginia', 'yvonne', 'rojas', 'nuñez', '02124825673', '04129193092', 'el paraiso', 'independiente', 'independiente', '1949-11-26', 'd189286451');
INSERT INTO estudiante VALUES ('3807699', 3807699, 'v', 'Gean', 'María', 'Carrillo', 'Mayta', '02126183073', '04129957599', 'Residencias Longaray, edificio santa rosa piso 12 apartamento 12_4.', 'Jubilada', 'Jubilada', '1949-10-03', '635e7aefdc');
INSERT INTO estudiante VALUES ('3817461', 3817461, 'v', 'Aida', 'Josefina', 'Cheremo', 'Zanotti', '04267103499', '04267105499', 'Montalban III, calle don fortunato apto. 3B la vega.', 'Mision Sucre', 'facilitadora', '1951-06-08', '0848fedf38');
INSERT INTO estudiante VALUES ('3959429', 3959429, 'v', 'Fanny', 'Romelia', 'Ornes', 'Montaner', '02124627705', '04123991063', 'Avenida Washintong Conjunto Residencial el Paraíso Edificio 1 Entrada B Piso 1 Apartamento 15', 'Aldeas Universitarias', 'Docente', '1954-03-12', 'b2ecc3e86c');
INSERT INTO estudiante VALUES ('4166620', 4166620, 'v', 'jose', 'Roque', 'Garcia', 'Gamboa', '04162276589', '04142185597', 'Bloque 20 Escalera 1 Apartamento 01 U-D2 Caricuao', 'Misoneros de la Comunicacion', 'Reportero', '1955-03-14', '05e6c804b2');
INSERT INTO estudiante VALUES ('4245444', 4245444, 'v', 'Margarita', 'Magalis', 'Hoepp', 'de Padron', '02126246030', '04123804057', 'san martin residencias centro 4 piso 6 apartamento 6 a', 'maternidad Concepcion palacios', 'Jubilada', '1953-08-12', '0b05de0ab9');
INSERT INTO estudiante VALUES ('4252760', 4252760, 'v', 'Luis', 'Ramon', 'Barreto', 'Pino', '02125501485', '04142588190', 'Avenida Fuerzas Armadas Esquina Crucecita a Porvenir Edif 200. Piso 4 Atpo 4D. La Candelaria', 'Restaurante', 'Mesonero Privado', '1950-11-28', '11225c6834');
INSERT INTO estudiante VALUES ('4253850', 4253850, 'v', 'jesus', 'ramon', 'ruiz', 'marquez', '02128642352', '04143308663', 'av baeralt entre yaguno y puente viejo edif palmar apt 104', 'instituto politecnico santiagio mariño', 'docenete', '1959-11-13', 'aedf7c97fa');
INSERT INTO estudiante VALUES ('4349119', 4349119, 'v', 'Doris', 'Doris', 'schweitze', 'Straus', '02127302998', '04126335581', 'Avenida san gabriel, quinta camaru, la alta florida', 'Jubilada', 'Jubilada', '1956-03-25', 'b8fa23c978');
INSERT INTO estudiante VALUES ('4419878', 4419878, 'v', 'Sandra', 'Domitila', 'Romero', 'Ramírez', '04128161100', '02125154883', 'Zona A. Terraza 23. Casa N.2. Ud 2. Caricuao.', 'Universidad Simón Rodríguez', 'Obrera', '1955-10-19', 'd88bd082dd');
INSERT INTO estudiante VALUES ('4421580', 4421580, 'v', 'jose', 'valerio', 'ortega', 'no', '02392485316', '00000000000', 'charallave urba el campito av gustavo ferrar bloque b piso 5 apt 51', 'no trabaja', 'no trabaja', '1948-12-24', '0b16d28653');
INSERT INTO estudiante VALUES ('4441084', 4441084, 'v', 'perl', 'Marina', 'Cheremo', 'Zanotti', '02124434583', '04242480397', 'Montalban III Residensia. Don fortunato piso 3 apto 3-B', 'por su cuenta', 'comerciante', '1956-06-24', 'bea3f3ebe8');
INSERT INTO estudiante VALUES ('4507829', 4507829, 'v', 'Oswaldo', 'Rafael', 'Guzman', 'Aleman', '02126710515', '04267056438', 'Av.Intercomunal El Valle, Residencias Tequendama, piso 8, apt 803', 'Pensionado', 'Pensionado', '1951-06-01', '149b412411');
INSERT INTO estudiante VALUES ('4594745', 4594745, 'v', 'Alba', 'Rosa', 'Lineros', 'de Cruz', '02122441218', '04167263178', 'Urb Turumo. N° 155. Mariches. Miranda.', 'Trabajo Independiente', 'Orfebreria', '1954-11-26', 'b51e6f2779');
INSERT INTO estudiante VALUES ('4684445', 4684445, 'v', 'Margarita', 'Sin Nombre', 'Manriquez', 'Sin nombre', '02127633451', '04122909385', 'Urbanizaci{on las delicias calle n| 2 edificio vicuña apto. 7 planta baja. sabana grande.', 'televen', 'enfermera', '1952-08-11', 'd283e5f459');
INSERT INTO estudiante VALUES ('4754490', 4754490, 'v', 'alexis', 'eduardo', 'castillo', 'no', '02123274096', '04142703993', 'calle sucre alcabala vieja estado vargas', 'jubilado', 'jubilado', '1952-06-30', '3d06ea9f35');
INSERT INTO estudiante VALUES ('4815716', 4815716, 'v', 'doris', 'josefina', 'granados', 'garcia', '02124833135', '04141263540', 'av. el ejercito, residencia villa real, n° 52-A urb. el paraiso', 'colegio paulo vi', 'docente', '1950-12-14', '2539eaa2e0');
INSERT INTO estudiante VALUES ('4834371', 4834371, 'v', 'Arelis', 'Edelmira', 'Rojas', 'Chavez', '02126814444', '04166722462', 'Res Guzman Blanco Edif Monagas piso 11 apto 112 coche caracas', 'Ministerio de salud', 'Coordinadora de odontologia', '1958-12-27', 'e20de52bf1');
INSERT INTO estudiante VALUES ('4850461', 4850461, 'v', 'diego', 'omar', 'villegas', 'lopez', '04265157942', '02123444537', 'calle monagas sector plaza casa 5 guatire mun zamora ', 'libreria sur', 'librero', '1955-06-29', '6e62097539');
INSERT INTO estudiante VALUES ('5013371', 5013371, 'v', 'omar', 'g', 'trujillo', 'f', '04142200959', '11111111111', 'calle lidice  la pastora caracas', 'ccs wines ca los cortijos', 'Encargado de ventas', '2056-08-01', 'ecf071c1e5');
INSERT INTO estudiante VALUES ('5096173', 5096173, 'v', 'Marvis', 'Josefina', 'Gil', 'Barreto', '02129767886', '04123126850', 'Res San carlo lomas de prado del este baruta caracas', 'Trabajo independiente', 'Abogado', '1958-04-15', 'da1a07be9e');
INSERT INTO estudiante VALUES ('5113055', 5113055, 'v', 'Enrique', 'Elvis', 'Garcia', 'Martinez', '02127450239', '04168019243', 'Guaicoco Municipio Sucre Estado Miranda Casa 48', 'Independiente', 'Profesor', '2057-06-09', 'cc7a8c5544');
INSERT INTO estudiante VALUES ('5145150', 5145150, 'v', 'mary', 'luz', 'alvarez', 'castro', '02126939608', '04141838529', 'los rosales', 'ucv', 'profesora', '1957-10-05', '684c7c3f69');
INSERT INTO estudiante VALUES ('5279754', 5279754, 'v', 'Maria', 'del carmen', 'belisario', 'contreras', '02129931187', '04166220163', 'las mercedes', 'ubv', 'ginecologa', '1959-12-29', 'f7f4c12089');
INSERT INTO estudiante VALUES ('5421346', 5421346, 'v', 'Carlos', 'Alfredo', 'Tosta', 'Fernandez', '02129764132', '04166347123', 'Calle la Colina, Edificio Palmas Reales, apartamento 2B, Santa Ines 1080', 'caracas santa Ines', 'traductor', '1957-12-02', 'd7c7c75956');
INSERT INTO estudiante VALUES ('5425601', 5425601, 'v', 'hilda', 'josefina', 'graterol', 'mendoza', '04269073215', '00000000000', 'av rossvelt residencia manaure piso 2 app 06', 'no posee', 'no posee', '1956-07-09', 'b22b7c89dd');
INSERT INTO estudiante VALUES ('5430120', 5430120, 'v', 'gladys', 'gladys', 'martin', 'navarro', '02127530095', '04166158911', 'calle caroni res. manaure II apto 22- b urb. colinas de bello monte baruta- miranda', 'ucv', 'profesora', '1946-06-29', '563c93d3c6');
INSERT INTO estudiante VALUES ('7952027', 7952027, 'v', 'maria', 'rosa', 'alvarado', 'vera', '02393656981', '04120199372', 'SAn FRancisco de Yare, calle sucre, casa numero 3', 'Independiente', 'Independiente', '1968-05-01', '1f1d2e459a');
INSERT INTO estudiante VALUES ('5565434', 5565434, 'v', 'Belkys', 'Amelia', 'Guerrero', 'Querales', '04166291892', '02128635381', 'Calle Oeste 3. Esquinas. Piso 3. Apto 36. Res. Pineda. Urb. Altagracia. Detrás de Miraflores.', 'Universidad Humbolt', 'Docente', '1960-11-20', '25ce306582');
INSERT INTO estudiante VALUES ('5589517', 5589517, 'v', 'Rafael', 'Rafael', 'Giner', 'Barreto', '04166220163', '02129931187', 'Calle Londres. Edif. New York. Apto. B. P.B. Las Mercedes. Baruta', 'Caracas', 'Militar Jubilado', '1958-05-12', '198a357748');
INSERT INTO estudiante VALUES ('5593906', 5593906, 'v', 'Judith', 'Del Valle', 'Herrada', 'Guerra', '02124329595', '04125844769', 'Bloque 14, piso 10, apt 1007, sector ud3, caricuao', 'Diario Correo del Orinoco', 'Coordinadora de Edicion', '1960-10-26', '902b26300b');
INSERT INTO estudiante VALUES ('5614290', 5614290, 'v', 'Maira', ' maira', 'rojas', ' rojas', '02126317646', '04265107635', 'calle los manguitos n10 el cementerio', 'ubv', 'docente', '1972-08-15', '81a55ada59');
INSERT INTO estudiante VALUES ('5904501', 5904501, 'v', 'Beatriz', 'Beatriz', 'Rodriguez', 'Brito', '02122743234', '04160128005', 'urbanizacion los naranjos calle b3 33 zona 3 guarenas', 'Independiente', 'Independiente', '1960-09-06', '2c992d9b83');
INSERT INTO estudiante VALUES ('6017573', 6017573, 'v', 'Carmen', 'Jacqueline', 'Zambrano', 'Bonillo', '02128587132', '04127360948', '23 de enero bloque 5, letra d apartamento c4', 'Jubilada', 'Jubilada', '1962-06-08', '6df11dbffb');
INSERT INTO estudiante VALUES ('6094223', 6094223, 'v', 'Gloria', 'Magiba', 'López', 'Pérez', '04163043939', '02125614920', 'Esq. Madrices a San Jacinto. Edif. Edsam - Piso 6. Apto 6-8. Catedral. Caracas.', 'Universidad Central', 'Secretaria', '1963-09-29', '8fb39cfbd4');
INSERT INTO estudiante VALUES ('6096050', 6096050, 'v', 'Luis', 'Jesus', 'Ruiz', 'Castillo', '04125951731', '02125621113', 'Socorro a Calero Residencias la Fuente PH-2 La Candelaria', 'Ministerio de Justicia', 'Operador de Sistemas Avanzados', '1959-05-05', 'f8e58742fc');
INSERT INTO estudiante VALUES ('6101538', 6101538, 'v', 'jose', 'francisco', 'gutierrez', 'gutierrez', '04128109058', '00000000000', 'caracas ', 'ubv', 'ubv', '1999-01-01', '894b4054c4');
INSERT INTO estudiante VALUES ('6101812', 6101812, 'v', 'Evelyn', 'Beatriz', 'López', 'López', '04125452299', '02124624551', 'Parroquia San Juan. Calle Circunvalación. Bloq 5. Piso 6. Apto 28', 'Caracas', 'Publicista', '1963-02-13', 'b22034d8d4');
INSERT INTO estudiante VALUES ('6127172', 6127172, 'v', 'Elías', 'Elías', 'Haffar', 'Kanech', '00000000000', '02127537206', 'Calle Voltaire. Edif. Cristal. P.H. Colinas de Bello Monte.', 'Universidad de las Fuerzas Armadas', 'Docente', '1945-11-13', '1fee5de0b3');
INSERT INTO estudiante VALUES ('6136474', 6136474, 'v', 'Judith', 'Reina', 'Perez', 'De Utrera', '02128587713', '04169397114', '23 de Enero, Tanque a porvenir, calle primavera , casa numero 53, sector la piedrita', 'Comerciante', 'Encargada', '1961-10-07', 'a3ff8dce77');
INSERT INTO estudiante VALUES ('6144090', 6144090, 'v', 'Ayexa', 'Veronica', 'Guevara', 'Rojas', '02124435832', '04243022895', 'Avenida Uslar. Calle 5A. Quinta del Valle, Vista Alegre. Caracas', 'Trabajo Independiente', 'Vendedora', '1964-02-27', '7cbbab05f7');
INSERT INTO estudiante VALUES ('6190018', 6190018, 'v', 'Antonio', 'Jose', 'Paredes', 'Cirelli', '02128586741', '04241822961', 'Urb. 23 de enero', 'Avicola avitecnica', 'Ejecutivo de ventas', '1965-07-05', '9833645ff8');
INSERT INTO estudiante VALUES ('6208396', 6208396, 'v', 'Ralyd', 'Alberto', 'Maldonado', 'Peña', '02129767886', '04123692468', 'Avenida Principal Lomas del este. Residencias Giancarlo. Caracas.', 'Trabajo Independiente', 'Publicidad', '1966-08-07', 'a3fa404793');
INSERT INTO estudiante VALUES ('6217262', 6217262, 'v', 'pavel', 'lenin', 'herrera', 'cendeño', '04127375516', '02124166360', 'avnico a socorro calle san pedro edif leo luci ', 'iutirla', 'progfesor', '1967-07-15', '7fd7607662');
INSERT INTO estudiante VALUES ('6230855', 6230855, 'v', 'Haydee', 'Haydee', 'Mendez', 'Cordovez', '02128586741', '04142663641', 'Urb.23 de Enero,Bloque 32, 701 a , zona e', 'Parlamento Latinoamericano', 'Secretaria', '1966-01-10', '30f138400f');
INSERT INTO estudiante VALUES ('6244210', 6244210, 'v', 'Sonia', 'Annonay', 'Arredondo', 'Arredondo', '04268855385', '02128780680', 'Vía El Junquito Km. 2. Calle La Hacienda. Quinta Rosa. Sector 5. Parroquia Libertador.', 'Unidad Educativa Fernando de Magallanes', 'Docente', '1965-02-07', '7529b17420');
INSERT INTO estudiante VALUES ('6248749', 6248749, 'v', 'milagros', 'yadira', 'parra', 'salazar', '02123131930', '04125774102', 'prados de maria', 'inces', 'analista', '1965-08-15', '0b715ab4c4');
INSERT INTO estudiante VALUES ('6264676', 6264676, 'v', 'lucila', 'no', 'karapapas', 'luck', '04242312425', '00000000000', 'av ppal san antonio de los altos torre f piso 13 ', 'indipendiente', 'independiente', '1966-06-04', 'd36c75da75');
INSERT INTO estudiante VALUES ('6275138', 6275138, 'v', 'thais', 'coromoto', 'vidal', 'diaz', '02122513973', '04164211184', 'urb leoncio martinez bloque 10 petare', 'ucv', 'estudiante', '1967-07-30', 'c3cc06edf5');
INSERT INTO estudiante VALUES ('6303212', 6303212, 'v', 'Yajaira', 'Escarlet', 'Lazo', 'De levy', '02123226553', '04126050912', 'Urb. Quenda, Bellora, piso 11, apto11g, los teques, edo. miranda', 'Audio video levy escan', 'Administradora', '1968-03-05', 'ea8307d173');
INSERT INTO estudiante VALUES ('6331894', 6331894, 'v', 'Osiris', 'Del Valle', 'Molina', 'Gonzalez', '02126322381', '04242348287', 'Av. Nueva Granada, Calle San Miguel. Casa 33', 'Centro Comercial de Coche', 'Comerciante', '1970-11-05', 'ff7edba8a8');
INSERT INTO estudiante VALUES ('6399097', 6399097, 'v', 'Lesbia', 'Margarita', 'Utrera', 'Ramirez', '02122568324', '04123836056', 'calle principal las praderas, casa nro. 1009 maca petare', 'ucv', 'asistente administrativo', '1962-11-05', '11783c6ce6');
INSERT INTO estudiante VALUES ('6399978', 6399978, 'v', 'carol', 'carol', 'hernandez', 'rangel', '04268186572', '02126939173', 'caracas el valle parroquia san antonio edificio san antonio ', 'medicinafacultad ucv', 'biblioteca', '1965-04-07', '2d045f86c4');
INSERT INTO estudiante VALUES ('6431221', 6431221, 'v', 'jos', 'Rafael', 'Rodriguez', 'Godoy', '02128831977', '04163085669', 'residencias parque carabobo piso 15 apto 15 d1', 'Estudiantee', 'Estudiante', '1963-05-08', 'bb73813413');
INSERT INTO estudiante VALUES ('6443291', 6443291, 'v', 'Isabel', 'Coromoto', 'Ramos', 'Galeano', '02124850749', '04265197650', 'final av. jose antonio paez res. villa paraiso torre b apto 22b', 'calle', 'comerciante', '1963-12-09', '70f4079824');
INSERT INTO estudiante VALUES ('6446241', 6446241, 'v', 'Yasmín', 'Del Carmen', 'Monsalve', 'Márquez', '04269052046', '02128728451', 'Catia, Ruperto Lugo. Bloque 2. Edif. 1. Piso 9. Apto 906. Urb. Carlos Guinand Sandoz.', 'Catia', 'Acupunturista', '1965-02-04', '740be70003');
INSERT INTO estudiante VALUES ('6452323', 6452323, 'v', 'alba', 'isabel', 'ramos', 'alvarez', '02128709980', '04143012763', 'catia', 'en casa', 'en casa', '1965-01-23', '3a5ace4806');
INSERT INTO estudiante VALUES ('6453629', 6453629, 'v', 'Iraima', 'Coromoto', 'Guedes', 'Rovira', '04169397010', '04162017174', 'Bloque 22 Pequeño Avenida Principal de la Cañada 23 de Enero', 'no', 'no', '1966-07-14', '0583c634c9');
INSERT INTO estudiante VALUES ('6464528', 6464528, 'v', 'daria', 'auxiliadora', 'navas', 'Garcia', '04142476504', '02128337217', 'lagunetica los teques', 'inversiones asamialex', 'administradora', '1964-06-07', '1bc346559d');
INSERT INTO estudiante VALUES ('6469164', 6469164, 'v', 'thay', 'consuelo', 'bermudez', ' delgado', '02128328332', '04129180944', 'santa rosalia pte hierro ', 'independiente', 'independiente', '2059-11-08', 'c017fa6d67');
INSERT INTO estudiante VALUES ('6496568', 6496568, 'v', 'Lourdes', 'Maria', 'Freites', 'Burciaga', '02123684106', '01429508255', 'Urb. La Atlantida, calle 8, quinta Lucrecia 1 y 2, Catia la Mar, Edo Vargas', 'Fundación Pueblo Soberano, Miraflores', 'Especialista en planificación', '1965-07-22', 'd56e7aebd4');
INSERT INTO estudiante VALUES ('6563726', 6563726, 'v', 'emilio', 'ramon', 'reyes', 'pino', '02122716690', '04129982233', 'urb. nueva casarapa edif. 7-b apto 44', 'la urbina', 'propietario', '1963-05-28', '65c970ff72');
INSERT INTO estudiante VALUES ('6810890', 6810890, 'v', 'sonia', 'coromoto', 'carias', 'estrella', '02812823806', '04128598565', 'residencia villa martinique n° de casa 36, calle r-16 lecheria anzoategui', 'comercio', 'comerciante', '1964-12-16', '2ac99c2493');
INSERT INTO estudiante VALUES ('6836369', 6836369, 'v', 'Zulay', 'Omaira', 'Hernández', 'Perdomo', '04142133341', '02128864769', 'Guaicaipuro Norte. Calle Táchira con Trujillo. Av. Andrés Bello. ', 'Centro Médico de Caracas', 'Enfermera', '1960-11-11', '2ce9788ea4');
INSERT INTO estudiante VALUES ('6928842', 6928842, 'v', 'Maria', 'Teresa', 'Vidal', 'Diaz', '02122513973', '04241172205', 'Av. Principal de Palo Verde, Urb. Leoncio Martinez, Bloque 10, C8, Las Vegas de Petare, Municipio Sucre. Edo. Miranda', 'Estudiante', 'Estudiante', '1966-05-05', '50e04f8049');
INSERT INTO estudiante VALUES ('7368255', 7368255, 'v', 'alcides', 'ramon', 'betancourt', 'garcia', '04125254335', '04247434193', 'Casco Central de charallave , residencias parque zamora , piso ph, ag, calle 8, parroquia charallave, municipio cristobal rojas, miranda', 'No trabaja', 'No trabaja', '1962-07-02', '8e1d687979');
INSERT INTO estudiante VALUES ('7566883', 7566883, 'v', 'Ana', 'Ana', 'Lorenzo', 'Demañas', '04162173584', '02127518940', 'Calle Voltaire. Edif. Jardín Bello Monte. Piso 13. Apto 13-3. Torre A. Colinas de Bello MOnte.', 'La Candelaria', 'Encargada', '1962-06-07', '54a39bed4f');
INSERT INTO estudiante VALUES ('7998182', 7998182, 'v', 'isabel', 'yaneth', 'mayora', 'agredo', '02123525461', '04262268830', 'calle la amistad casa 6 marapa catia la mar', 'Independiente', 'Independiente', '1966-02-08', 'dd9238f419');
INSERT INTO estudiante VALUES ('8346353', 8346353, 'v', 'Ingrid', 'Maribel', 'Chauran', ' no valido', '02128618583', '04262067879', 'Avenida Baralt Norte. Esquina dos pilitas. Santa Rosalia', 'Ama de Casa', 'Ama de Casa', '1968-03-02', 'd6793b22ba');
INSERT INTO estudiante VALUES ('9147984', 9147984, 'v', 'Aidee', 'Esteli', 'Jimenez', 'Contreras', '02124842373', '04165376462', 'Ave Baralt Esquina Bucare. Residencias Bucare, Apto 45-13. Parroquia Santa Rosalia. Caracas', 'Biblioteca Nacional', 'Especialista en informacion', '1964-06-15', 'e768971411');
INSERT INTO estudiante VALUES ('9405243', 9405243, 'v', 'zaina', 'zzzz', 'jondieh', 'jjjj', '04241387222', '11111111111', 'las acacias caracas', 'caracs', 'Encargada', '2062-12-15', '98f4c92cb5');
INSERT INTO estudiante VALUES ('10194962', 10194962, 'v', 'Marisol', 'No', 'Quintero', 'No', '02124711592', '04143707296', 'San Martin', 'no posee', 'no posee', '1971-09-01', 'ffb1f07c7b');
INSERT INTO estudiante VALUES ('10236689', 10236689, 'v', 'nola', 'rita', 'rojas', 'no', '02124762797', '04169003606', 'la vega', 'chuao', 'enfermera', '1965-03-04', '738baef4b7');
INSERT INTO estudiante VALUES ('10513731', 10513731, 'v', 'Keyla', 'Josefina', 'Castejon', 'Sandoval', '02124838191', '04249717998', 'Calle principal Manicomio Callejo el milagro no 8 la pastora caracas', 'Parlamento latino', 'Administrativo', '1971-07-21', 'da79a272bd');
INSERT INTO estudiante VALUES ('10537691', 10537691, 'v', 'juan', 'jose', 'perez', 'delboy', '04269163243', '11111111111', 'alta gracia caracas', 'no trabaja', 'Estudiante', '1972-04-04', '0019cbe362');
INSERT INTO estudiante VALUES ('10542923', 10542923, 'v', 'Ines', 'Karina', 'Pineda', 'Pineda', '02123524917', '04122311105', 'Avenida principal playa grande residencias los delfines, catia la mar. ', 'Independiente', 'Independiente', '1971-12-03', '35983234e2');
INSERT INTO estudiante VALUES ('10578660', 10578660, 'v', 'Ibis', 'Mirensu', 'Mejias', 'Pirela', '02394158346', '04142441024', 'Charallave', 'Tradisca', 'traductor', '1969-11-27', '3c48247613');
INSERT INTO estudiante VALUES ('10690807', 10690807, 'v', 'Jenny', 'Lisett', 'Díaz', 'Castillo', '04160107013', '02393659566', 'Charallave. Urb. El Gran Chaparral. Calle El Manantial. Qta. Jerany. Edo. Miranda', 'Ministerio de Petreóleo', 'Abogada', '1969-12-23', '6ad288adea');
INSERT INTO estudiante VALUES ('10786113', 10786113, 'v', 'Felix', 'Johan', 'Molina', 'Molina', '02123427098', '04167151094', 'Guatire', 'Seniat', 'planificador', '1971-07-05', '15ef3e04d0');
INSERT INTO estudiante VALUES ('11225874', 11225874, 'v', 'Celandia', 'Leonor', 'Ascanio', 'Moreno', '02122638665', '04262199927', 'Segunda Calle, transv La Castellana,Calle Fanfan, casa Mami.El Pedregal', 'El Universal', 'Asesor Comercial Senio', '1973-02-27', '8956ffa25c');
INSERT INTO estudiante VALUES ('11308776', 11308776, 'v', 'Nina', 'Gabriela', 'De jesus', 'Noguera', '02122431903', '04141351554', 'Terrazas de guaicoco resd apamate torre h h23 mariche petare mirando', 'Ariex', 'Analista', '1972-09-02', '194dad8951');
INSERT INTO estudiante VALUES ('11448120', 11448120, 'v', 'jose', 'luis', 'castellin', 'palomo', '04241883044', '00000000000', 'calle ppp los mesedores edif diegho de lozada appt g88 la pastora ', 'ubv', 'docente', '1972-05-23', 'e5df867529');
INSERT INTO estudiante VALUES ('11559219', 11559219, 'v', 'Wilmar', 'Miguel', 'Cardenas', 'Villar', '02125970020', '04265183476', 'Res. Auyantepuy, Piso 4, Los Jardines del Valle', 'Consejo Nacional Electoral', 'Administrativo', '1976-09-17', '32187cfc02');
INSERT INTO estudiante VALUES ('11920619', 11920619, 'v', 'Hevely', 'Hevely', 'Newman', 'Angulo', '02127510044', '04142698926', 'Calle Chopan. Edif. Amapola Piso 2 Apto 23. Urb. Colinas de Bello Monte', 'Corpolec', 'ingeniero Mecanico', '1975-03-12', '1bcafe2844');
INSERT INTO estudiante VALUES ('11937465', 11937465, 'v', 'betty', 'margoth', 'sanchez', 'de quijada', '02125416834', '04162125892', 'av. paez edif. puente hierro apto 5', 'casa', 'tareas dirigidas', '1946-06-21', '8222644c10');
INSERT INTO estudiante VALUES ('11986411', 11986411, 'v', 'Yliane', 'Carolina', 'De Santolo', 'Mendieta', '02126063985', '04166184911', 'Av.Victoria, Urb Las Acacias, calle Guayana, Residencia Mesbla, piso 2 , apt 209', 'ubv', 'Docente', '1974-07-18', '2da45debea');
INSERT INTO estudiante VALUES ('11990080', 11990080, 'v', 'carmen', 'elena', 'santander', 'garelli', '02123626834', '04264124484', 'edificio j 2 piso 2 apto nro 7 los girasoles guarenas', 'del hogar', 'del hogar', '1972-08-09', '40c0cbd0df');
INSERT INTO estudiante VALUES ('12076432', 12076432, 'v', 'Jose', 'Nixon', 'Ortega', 'Ortega', '04140285409', '04140285409', 'Urb. Cartanal, av 6, sector 4, casa nro 2, municipio Independencia, los Valles del Tuy', 'Desempleado', 'Desempleado', '1972-04-27', '06415c0d92');
INSERT INTO estudiante VALUES ('12261246', 12261246, 'v', 'Alvaro', 'Jose', 'Montes', 'Peralta', '02126394431', '04125581061', 'La raiza, carretera ppal la urbina, nuestra señora de guadalupe, casa 128 a, miranda', 'Independiente', 'Electricista', '1974-09-29', '124f4250e4');
INSERT INTO estudiante VALUES ('12292310', 12292310, 'v', 'Carme', 'Elida', 'Carrillo', 'Vargas', '02125777940', '04166225210', 'Avenida miguel angel edificio julio cesar piso 4 apartamento 19 b colinas de bello monte', 'Ingepro', 'Directora de operaciones', '1953-05-15', '3ed6eb4047');
INSERT INTO estudiante VALUES ('12392964', 12392964, 'v', 'Noelia', 'Noelia', 'Fuentes', 'Caceres', '02128370061', '04125551902', 'Dos pilitas a portello, edif joropo, piso 4, apto 42, la pastora', 'Del hogar', 'Ama de casa', '1975-12-02', '5ba11776ba');
INSERT INTO estudiante VALUES ('12395446', 12395446, 'v', 'lisol', 't', 'behmert', 'mendoza', '04129955726', '11111111111', 'av fuerza armada caracas', 'indipendiente', 'venta', '1977-02-14', '871aaeb983');
INSERT INTO estudiante VALUES ('12410017', 12410017, 'v', 'gerlys', 'brizoley', 'torres', 'mejias', '02126252000', '04142629333', 'petare', 'no', 'no', '1975-03-20', '860820b317');
INSERT INTO estudiante VALUES ('12410521', 12410521, 'v', 'zulay', 'del carmen', 'altamira', 'villarreal', '04129302007', '04129302007', 'charallave, urbanizacion mata linda, conjunto residencial g2 casa 59 conjunto las isoras', 'charallave', 'comerciante', '1975-08-25', '71ed8ccf8d');
INSERT INTO estudiante VALUES ('12575455', 12575455, 'v', 'rosa c', 'irene', 'arevalo', 'orzero', '04242126669', '04242126669', 'av. sur 1, esquina madrices a san jacinto, residencia, edsam suite, piso 12, apartamento 12-8', 'ciudad caracas', 'correctora', '1977-03-03', 'ad73c89a66');
INSERT INTO estudiante VALUES ('12639807', 12639807, 'v', 'Edgardo', 'De Jesús', 'Colmenares', 'Campos', '04120979325', '02124516256', 'Av. San Martín. Urb. Industrial. San Martín. Res. La Floresta. Torre Margarita. Piso 5. Apto 51.', 'Caracas', 'Diseñador Gráfico', '1975-09-28', '3d96ad349c');
INSERT INTO estudiante VALUES ('12687712', 12687712, 'v', 'elianna', 'alianna', 'gomez', 'ramirez', '02126726038', '04125239837', 'Av Intercomunal del Valle, edif cerro grande, piso 12, apt 23', 'supra', 'supervisora', '1976-07-30', '66f0818864');
INSERT INTO estudiante VALUES ('12954957', 12954957, 'v', 'marlene', 'marlene', 'baptista', 'de nobrega', '04123847604', '02126935352', 'av victoria edif vic planta baja app 4 urbanizacion las acasias parroquian san pedro ', 'no posee', 'no posee', '1977-07-25', '8ddd28be92');
INSERT INTO estudiante VALUES ('12955762', 12955762, 'v', 'alberto', 'rafael', 'rodriguez', 'izquierdo', '04166325648', '02127937967', 'av las acacias edif caracas piso 4 apt a', 'cne', 'tecnico', '1976-06-18', 'af88cca3a6');
INSERT INTO estudiante VALUES ('13067965', 13067965, 'v', 'Marelly', 'Soraya', 'Pabon', 'Camacho', '02129999819', '04141209782', 'Cua', 'Banco del Tesoro', 'informatica', '1977-08-23', 'dae3036c04');
INSERT INTO estudiante VALUES ('13162465', 13162465, 'v', 'Christian', 'emilio', 'quijada', 'sanches', '02125416834', '04162125892', 'av ppal puente hierro edif, puente hierro', 'iutrc', 'profesor', '1978-06-16', 'd9bdf9c37f');
INSERT INTO estudiante VALUES ('13171743', 13171743, 'v', 'Jose', 'Gregorio', 'Albarran', 'Lopez', '02127428834', '04165305343', 'Calle Internacional c calle chile, quinta Ana-Anexo. Las Acacias', 'Diseñador', 'trabaja por su cuenta', '1976-11-15', '518d87db74');
INSERT INTO estudiante VALUES ('13224255', 13224255, 'v', 'Eduardo', 'David', 'Castillo', 'Santana', '02123274096', '04263130573', 'Calle Sucre Alcabala N° 67. Estado Vargas', 'Cuenta propia', 'Administrador', '1974-11-23', 'ca5e394f6e');
INSERT INTO estudiante VALUES ('13231533', 13231533, 'v', 'Yorjan', 'Rafael', 'Molina', 'Linares', '02123223066', '04166080500', 'Los Teques, Calle Luis Correa, El vigia, Casa No. 4', 'Concejo Municipal', 'Asistente', '1976-08-17', '44806f3f87');
INSERT INTO estudiante VALUES ('13459096', 13459096, 'v', 'Yessica', 'Alejandra', 'Urbaneja', 'Urbaneja', '02128635261', '04264176175', 'av. Baralt. Esq. Truco. Edif. Abildo II. Piso 14', 'Caracas', 'Comerciante', '1981-08-22', '6de206eb21');
INSERT INTO estudiante VALUES ('13459689', 13459689, 'v', 'yelitza', 'no', 'adrian', 'pacheco', '04165181732', '04168070852', 'av fuerzas armadas entre santa rosa y santa isabel edif las brisas piso 16 apt 16', 'aeropuertos simon bolivar', 'agente de trafico aereo', '1981-03-02', 'a6ad1819a9');
INSERT INTO estudiante VALUES ('13614671', 13614671, 'v', 'gustavo', 'david', 'velasquez', 'purroy', '04122347051', '04122347051', 'av. miguel angel con calle caroni.edif. mendi eder torre h apto sotano 1 colinas de bello monte. municipio baruta', 'la estancia', 'trabajador', '1977-03-07', '49f8402c17');
INSERT INTO estudiante VALUES ('13749723', 13749723, 'v', 'Eilian', 'Francis', 'Jara', 'De freita', '02128607121', '04127041305', 'avda a aralt centro residencial llaguno piso 11 apto 119 caracas', 'yanfrancis', 'Vendedora', '1979-01-13', '51155427b6');
INSERT INTO estudiante VALUES ('13832649', 13832649, 'v', 'Jennifer', 'Jennifer', 'Semprun', 'Paez', '02122574535', '04242167832', 'El llanito', 'Amway', 'coordinador', '1978-03-29', '87b5bdf141');
INSERT INTO estudiante VALUES ('13832848', 13832848, 'v', 'mayra', 'alejandra', 'piñango', 'guerra', '02122438620', '04161527323', 'urbanizacion guaicoco edificio simone piso apto 01-02', 'johannes kepler las acacias', 'instructora', '1979-01-20', '24d3cfe569');
INSERT INTO estudiante VALUES ('13864801', 13864801, 'v', 'ana', 'graciela', 'linares', 'briceño', '02126820532', '04129330956', 'residencia hipódromo bloque 1, edificio 2, piso 2, apartamento 25.', 'idena', 'directora del centro', '1978-09-13', '218729862f');
INSERT INTO estudiante VALUES ('13893485', 13893485, 'v', 'Milena', 'Carolina', 'Matos', 'Orense', '02122356317', '04120187778', 'Los Ruices Calle Maria Auxiliadora Residencias Los Pinos Piso 2 Numero 26', 'no', 'no', '1979-07-23', '3520831582');
INSERT INTO estudiante VALUES ('13904532', 13904532, 'v', 'milena', 'del nazaret', 'antias', 'gonzalez', '04164074654', '04142922241', 'la lagunita sector el esfuerzo calle gardenia casa 12 a valles del tuy ', 'ubv', 'administrativo', '1979-10-18', '76eb948225');
INSERT INTO estudiante VALUES ('14156292', 14156292, 'v', 'irma', 'dayana', 'delgado', 'goitia', '04125626835', '00000000000', 'colinas de bello m,onte plaza lincol calle chipin edif colibri ', 'independiente', 'actris', '1980-03-27', '48c045d54f');
INSERT INTO estudiante VALUES ('14351766', 14351766, 'v', 'Ini', 'Lauven', 'Ojeda', 'Sanabria', '04167127809', '02122345752', 'Avenida Francisco de Miranda Edificio Ilse Piso 15 Apartamento 155', 'Universidad Bolivariana de Venezuela', 'Docente', '1981-02-06', 'f51c3cb72f');
INSERT INTO estudiante VALUES ('14391985', 14391985, 'v', 'Jose', 'Alejandro', 'Arraez', 'Urbina', '04263291318', '04168199166', 'Km 14 Carretera Vieja Petare-Guarenas, Casa ', 'Universidad Humbolt', 'Coordinador de Laboratorios', '1979-10-12', 'bffda36bb9');
INSERT INTO estudiante VALUES ('14411318', 14411318, 'v', 'Johanna', 'Del Carmen', 'Rivero', 'Parada', '04165505174', '02126605726', 'Barrio El Campito Calle Milano Callejon El Olvido Casa 15 Petare', 'Universidad Bolivariana de Venezuela', 'Investigadora', '1981-03-07', '4928d98c98');
INSERT INTO estudiante VALUES ('14518496', 14518496, 'v', 'kelly', 'thatiana', 'quintero', 'aviles', '02126817587', '00000000000', 'av ppa de coche edif las estampa piso 1 ', 'vivas y asociados', 'recepcionista', '1990-03-13', '7be7763766');
INSERT INTO estudiante VALUES ('14531735', 14531735, 'v', 'Marcos', 'Jesus', 'Felizzola', 'Da Silva', '02129090418', '04166152258', 'Av. Luisa Caceres de Arismendi, casa n{umero 10 .Los Rosales', 'Conatel', 'Asistente de Biblioteca', '1976-08-19', 'd9a1117648');
INSERT INTO estudiante VALUES ('14534334', 14534334, 'v', 'Martha', 'Maria', 'Mujica', 'Chirinos', '04142450965', '02127087423', 'Av. Fco. Javier Ustáriz. Edif. San Vicente. Pb. Apto. 2. San Bernardino. Caracas.', 'Ministerio de Petreóleo', 'Abogada', '1981-06-01', '00124e3d40');
INSERT INTO estudiante VALUES ('14756420', 14756420, 'v', 'Eric', 'Marlon', 'López', 'Torres', '04123987425', '02124337270', 'Caricuao. Calle Principal de San Pablito. Casa n. 42.', 'Venozalana de Televisión', 'Administrador de Sistemas', '1982-05-12', 'e115076120');
INSERT INTO estudiante VALUES ('14784614', 14784614, 'v', 'Yumey', 'Carolina', 'Vega', 'Quintero', '04147185797', '04167123455', 'Urbanizacion Loira Quinta Xanadu el PAraiso', 'MInisterio de Petroleo y MIneria', 'Apoyo profesional', '1981-10-29', 'a8bc3613f1');
INSERT INTO estudiante VALUES ('14954084', 14954084, 'v', 'Oscar', 'Rafael', 'Ruiz', 'Diaz', '02126729379', '04167047377', 'Avenida Intercomunal del Valle Edf Fonvica. Piso 2 Apto 21. El valle. Caracas.', 'Desempleado', 'Desempleado', '1980-07-17', '942946d527');
INSERT INTO estudiante VALUES ('15098340', 15098340, 'v', 'nardi', 'maryvis', 'lopez', 'duran', '02128587325', '04263843250', '23 de enero zona f bloque 40 letra c apto 15', 'aldea universitaria manuel palacios blanco', 'estudiante', '1981-03-11', '1f393a6d9c');
INSERT INTO estudiante VALUES ('15148249', 15148249, 'v', 'Alexnis', 'Tibisay', 'Silvera', 'Amundaray', '04166183459', '02126063118', 'Caricuao', 'Ubv', 'Analista', '1982-01-27', '0af4b1a82e');
INSERT INTO estudiante VALUES ('15161930', 15161930, 'v', 'Luz', 'Marina', 'Ratia', 'Betancourt', '02124327642', '04129177735', 'Colinas de Palo Grande, calle nueva, casa numero 66-5, Ruiz Pineda, Caricuao', 'E.t.c. Santos Michelena', 'docente', '1982-12-07', 'a0735f4466');
INSERT INTO estudiante VALUES ('15200857', 15200857, 'v', 'Ana', 'Maria', 'Berroteran', 'Perez', '02126813204', '04166134682', 'Urb Carlos Delgado Chalbaud, Calle los cedros, vereda 52 casa ° 4. Coche. Caracas', 'EBN Jose de Cruz Carrillo', 'Docente', '1982-03-23', 'fe1e6f95db');
INSERT INTO estudiante VALUES ('15217394', 15217394, 'v', 'Oscar', 'Daniel', 'Velasquez', 'flores', '04261187229', '02126063118', 'Artigas arvelo. Quebradita 1', 'Ubv', 'Analista', '1980-08-23', '71f249b649');
INSERT INTO estudiante VALUES ('15327666', 15327666, 'v', 'Joffre', 'Alejandro', 'Yerena', 'Pimentel', '04163216569', '02128848305', 'La Bonita. Municipio Baruta.', 'Caracas', 'Comerciante', '1981-08-29', '471ed7d958');
INSERT INTO estudiante VALUES ('15327668', 15327668, 'v', 'Marzia', 'Valentina', 'Rada', 'Bermúdez', '04267111541', '02128328332', 'Guayabal a Venado. Edif. Torre Gavi. Puente Hierro.', 'Conatel', 'Bibliotecóloga', '1982-10-07', 'a5c3c8d4fc');
INSERT INTO estudiante VALUES ('15366003', 15366003, 'v', 'Lynnef', 'Alejandra', 'Yerena', 'Pimentel', '02124253827', '04126280765', 'La boyera', 'Comercio', 'Comerciante', '1980-10-26', 'dd7c885920');
INSERT INTO estudiante VALUES ('15440972', 15440972, 'v', 'Ana', 'Grely', 'Anteliz', 'Castellanos', '02127087092', '04241125212', 'Barrio san pascual, calle principal alberto ravell, nro 15, parroquia petare, municipio sucre, edo miranda', 'Ministerio del poder popular de petróleo y mineria', 'Apoyo profesional', '1981-11-17', '1799687ee5');
INSERT INTO estudiante VALUES ('15518458', 15518458, 'v', 'Yarubi', 'teresa', 'nava', 'pino', '02126350012', '04123851710', 'av. pedro russo ferrer res. la quinta, terraza 10 edificio 10-b apto 10b24 los teques', 'banco del tesoro', 'especialista tecnologico', '1983-04-27', '36c9314d15');
INSERT INTO estudiante VALUES ('15585363', 15585363, 'v', 'douglas', 'jose', 'mendoza', 'carrasquero', '02128788309', '04167226529', 'km 3 el junquito', 'los cortijos', 'musico', '1983-01-06', 'd791bcb48d');
INSERT INTO estudiante VALUES ('15614763', 15614763, 'v', 'Esmeralda', 'Cixela', 'Alvire', 'Méndez', '04263205821', '02125246670', 'Carretera Vieja Petare - Guarenas. Km. 15. Urb. Araguaney. Edif El Corozo. Piso 2. Apto 2.', 'Magistratura', 'Analista', '1980-09-25', '595e401476');
INSERT INTO estudiante VALUES ('15615322', 15615322, 'v', 'Jackeline', 'Carolina', 'Castro', 'Mestre', '02126724238', '04120180464', 'Calle 1, Los Jardines,Edif Bricemont, El Valle', 'Igmai Global', 'Ejecutiva de Ventas', '1983-01-04', '91b13642c8');
INSERT INTO estudiante VALUES ('15616204', 15616204, 'v', 'Adalys', 'no', 'Rodriguez', 'Moreno', '02127937967', '04125616204', 'Av las acacias edif caracas piso 4 apt 74 Las acacias', 'Cne', 'Profesional', '1978-08-19', 'e3053292cc');
INSERT INTO estudiante VALUES ('15804302', 15804302, 'v', 'mariana', 'mari', 'Rodriguez', 'Mejias', '04142253095', '02125650327', 'Av Panteon, Esquina Brisas a Renmedios, edi Nati, piso 1, apt 11', 'No trabaja', 'No trabaja', '1981-02-27', 'aa48596971');
INSERT INTO estudiante VALUES ('15812170', 15812170, 'v', 'macarena', 'de milagros', 'benitez', 'batista', '02124195757', '04241983588', 'los chaguaramos', 'venevision', 'actriz', '1981-01-02', 'c7ed25bff4');
INSERT INTO estudiante VALUES ('15856401', 15856401, 'v', 'alix', 'adriana', 'collantes', 'angarita', '04265191971', '04242285654', 'via naranjal san rafael de la montaña casa 2 edo. miranda', 'centro nacional de rehabilitacion', 'medico fisiatra', '1969-10-18', '30db7669fb');
INSERT INTO estudiante VALUES ('15976145', 15976145, 'v', 'jennifer', ' leonor', 'fernandez', 'mogollon', '04127258594', '02127530463', 'colinas de bello monte calle bamplan edif los arboles torre c 17- e', 'cc sambil', 'operadora', '1982-08-24', '0bd0b82ad6');
INSERT INTO estudiante VALUES ('16032169', 16032169, 'v', 'dennis', 'isabel', 'hernandez', 'sancehez', '04242844328', '02122327076', 'urb santa cecilia calle 4casa dunes', 'tves', 'periodista', '1982-01-09', '1c473c56cb');
INSERT INTO estudiante VALUES ('16084580', 16084580, 'v', 'Pedro', 'Miguel', 'Escudero', 'Graterol', '02124813565', '04265116330', 'Caracas, parroquia san juan, calle puente junin a pescador, torre b, apto173 b', 'Hospital perez carreño', 'Medico', '1984-04-13', '08e34ab887');
INSERT INTO estudiante VALUES ('16086444', 16086444, 'v', 'Meibel', 'Johan', 'Di martino', 'Benitez', '02126412214', '04142897165', 'Av. sucre, calle ppal manicomio, calle lozada, nro 23', 'Farmatodo', 'asesor de ventas', '1984-03-03', '96fcb69e2b');
INSERT INTO estudiante VALUES ('16114139', 16114139, 'v', 'manue', 'Alejandro', 'Abreu', 'Abreu', '04142153929', '02126313176', 'calle la cruz numero 27 prado de maria', 'Estudiante', 'Estudiante', '1983-04-08', 'fdbf3629d3');
INSERT INTO estudiante VALUES ('16148337', 16148337, 'v', 'jeyson', 'antonio', 'castro', 'rojas', '04125569530', '00000000000', 'res la quinta terraza 10  torre b app 1024', 'pass  sodeso', 'afiliador', '1982-03-31', '7bf3aef833');
INSERT INTO estudiante VALUES ('16179721', 16179721, 'v', 'Jesus', 'Gabriel', 'Tineo', 'Leon', '02125777005', '04140300157', 'San Bernardino', 'Manaplas', 'ventas', '1983-06-09', '7c492bd927');
INSERT INTO estudiante VALUES ('16284976', 16284976, 'v', 'Luis', 'Alfredo', 'Fumero', 'Suárez', '04262393758', '02125774714', 'Parque Central. Edif. San Martín. Piso 17. Apto G. Caracas.', 'Compañía de Telecomunicaciones', 'Ejecutivo', '1982-12-24', 'c34e779c26');
INSERT INTO estudiante VALUES ('16301238', 16301238, 'v', 'gabriel', 'dario', 'solorzano', 'sanchez', '02127632354', '04129977711', 'sabana grande', 'sabana grande', 'programacion', '1983-06-22', '6f24230a8e');
INSERT INTO estudiante VALUES ('16430446', 16430446, 'v', 'maertha', 'cecilia', 'fernandez', 'conforme', '02128869763', '04164121343', 'av. francisco de miranda edificio toledo piso apto 10 chacao.', 'colegio libertador', 'docente', '1966-03-07', 'b0d57cd123');
INSERT INTO estudiante VALUES ('16457756', 16457756, 'v', 'juan', 'jose', 'montero', 'uriana', '04129685468', '00000000000', 'la guarita mun el hatillo ', 'indipendiente', 'independiente', '1984-02-28', 'de9dfbc7ff');
INSERT INTO estudiante VALUES ('16544244', 16544244, 'v', 'amadeu', 'nathan', 'wetzstein', 'acosta', '04123834463', '02124324046', 'av maria tereza ttoro las casias quinta juanita', 'hotel embassy suite', 'opetador telefonico', '1983-05-01', 'b82a101ff6');
INSERT INTO estudiante VALUES ('16555999', 16555999, 'v', 'joan', 'rafael', 'rivas', 'santaella', '04266462072', '02125503194', 'la candelaria', 'no trabaja', 'no trabaja', '1984-10-29', '54c20b79ec');
INSERT INTO estudiante VALUES ('16562288', 16562288, 'v', 'alfredo', 'no tiene', 'fung', 'lai', '02126323956', '04122560131', 'av. nueva granda con calle la linea torre c piso 9', 'ucv', 'estudiante', '1985-05-23', '69b977022b');
INSERT INTO estudiante VALUES ('16562562', 16562562, 'v', 'danitza', 'coromoto', 'turmero', 'guerrero', '04129382499', '02129141164', 'calle codasi edif rebeca piso apt 12 los chaguaramos ', 'inersiones cessica', 'asistente administrativo', '1983-07-07', '50de41b331');
INSERT INTO estudiante VALUES ('16564590', 16564590, 'v', 'luis', 'camilo', 'rivas', 'amaro', '02128620993', '04267471940', 'esquina el molino casa nro 5 el manicomio la pastora', 'ministerio del poder popular para la industria', 'director', '1984-10-08', '265b73bf79');
INSERT INTO estudiante VALUES ('16568405', 16568405, 'v', 'Adan', 'Norberto', 'Quero', 'Castro', '04144666634', '04144666634', 'Av. libertador, casa 10', 'Ucv', 'Tecnico video conferencias', '1983-05-03', 'c38d0386f6');
INSERT INTO estudiante VALUES ('16604386', 16604386, 'v', 'Jose', 'Humberto', 'Nuñez', 'Carrero', '02128647364', '04266062350', 'Alta Vista', 'Melia Caracas', 'mantenimiento', '1984-11-29', 'f90892a4c3');
INSERT INTO estudiante VALUES ('16659596', 16659596, 'v', 'Adrián', 'Orlando', 'Adrián', 'Aranguren', '04128597244', '02126813594', 'Av. Guzmán Blanco. Bloque 3. Letra D. Apto 8. Coche.', 'Caracas', 'Diseñador Gráfico', '1983-12-22', '2ad7bebf43');
INSERT INTO estudiante VALUES ('16663376', 16663376, 'v', 'Erika', 'Del Carmen', 'Rodrigues', 'Sanchez', '02124160382', '04264332212', 'El Junquito Km8', 'Hospital Perez Carreño', 'Enfermera', '1983-09-28', '4d64d71035');
INSERT INTO estudiante VALUES ('16811940', 16811940, 'v', 'aguilar', 'exposito', 'deivy', 'wilfredo', '02127087969', '04268064946', 'urbanizacion terrazas del paraiso, av paez, el paraiso caracas.', 'ministerio del petroleo y mineria', 'apoyo profecional', '1985-05-01', 'f625c9f434');
INSERT INTO estudiante VALUES ('16850907', 16850907, 'v', 'Jesus', 'Rafael', 'Rodriguez', 'Garcia', '04168145110', '04168145110', 'Calle San Carlos Quinta Marisela. Urbanizacion Vista Alegre, Caracas', 'Editorial La Estrella Roja', 'Editor', '1984-06-27', '169e92e0f0');
INSERT INTO estudiante VALUES ('16871393', 16871393, 'v', 'Sujeidi', 'Alnellis', 'Gomez', 'Blanco', '02125144768', '04242326755', 'Parroquia San Agustin. El progreso, calle cuatro. Caracas.', 'Estudiante', 'Estudiante', '1986-03-09', '3fd7b7b59c');
INSERT INTO estudiante VALUES ('16890948', 16890948, 'v', 'Johalys', 'Coromoto', 'Morales', 'Malave', '04142656406', '02122148174', 'Av. Intercomunal del Valle. Calle 11. Res. Villa Jardín. Piso 11. Apto 11-01.', 'No trabajo', 'No trabajo', '1984-05-09', '1fc31aae67');
INSERT INTO estudiante VALUES ('16900623', 16900623, 'v', 'Maria', 'Gabriela', 'Daza', 'Valera', '02129862048', '04265188122', 'Ave Norte 4 Edificio Daymar VI apto 82-A. Los Naranjos. El Cafetal', 'Cne', 'Tecnico unico', '1984-10-17', '8e4613f013');
INSERT INTO estudiante VALUES ('16901836', 16901836, 'v', 'Geraldine', 'Geraldine', 'Madera', 'Velasquez', '02126615301', '04261203578', 'Santa Monica', 'estudiante', 'estudiante', '1985-09-05', '15fa3e1df1');
INSERT INTO estudiante VALUES ('16905375', 16905375, 'v', 'Reinaldo', 'Jose', 'Dominguez', 'Lopez', '02125454158', '04141076562', 'Av Principal de Puente Hierro, Edif SAn Carlos, piso 1, apt 3', 'ubv', 'Asistente Financiero', '1985-10-09', 'fcf194a52e');
INSERT INTO estudiante VALUES ('16923540', 16923540, 'v', 'hector', 'ramon', 'piñango', 'ortiz', '02123222522', '04262213720', 'Los Teques, Calle Principal,Lagunetica, casa 18b2', 'Estudiante', 'Estudiante', '1984-09-10', '53c25df466');
INSERT INTO estudiante VALUES ('16937994', 16937994, 'v', 'Omar', 'Enrique', 'Mejias', 'Aular', '02399928757', '04264062934', 'Charallave,Secor el Dividivi,casa numero 33, av principal', 'Grupo de Arquitectos Carcas', 'Director', '1984-09-22', '8b08697f33');
INSERT INTO estudiante VALUES ('16970555', 16970555, 'v', 'Anthony', 'Jose Jacque', 'Perez', 'Villa', '02125749603', '04125642524', 'Av.Andres Bello,quinta transversal, Guaicaipuro Sur, callejon Sanchez, casa 24', 'Independiente', 'Independiente', '1986-04-18', '55e933cc1b');
INSERT INTO estudiante VALUES ('17075089', 17075089, 'v', 'gabriela', 'carolina', 'abreu', 'rangel', '04125881561', '02127314876', 'av fuerzas armadas, porvenir a chimbora edif el provenier ', 'independiente', 'independiente', '1986-08-20', '52b4143d22');
INSERT INTO estudiante VALUES ('17076666', 17076666, 'v', 'Dreily', 'Minnely', 'Díaz', 'Tinoco', '02126241435', '04241882645', 'Av.intercomunal del valle, sector san adres calle pedro basalo casa nro 5. el valle', 'Bfc', 'analista', '1984-06-21', '0f25a71d2d');
INSERT INTO estudiante VALUES ('17123389', 17123389, 'v', 'Henry', 'Alexander', 'Rubio', 'Pulgar', '02125754561', '04168329968', 'Calle colon, edif. tirrenia, piso 6-32, los caobos, caracas', 'Artes gerenciales consultores', 'asistente comercial', '1983-10-01', '434ca79132');
INSERT INTO estudiante VALUES ('17148460', 17148460, 'e', 'alessandra', 'armenia', 'antuare', 'maita', '02122002691', '04242537172', 'av este 6 candelaria', 'ittaca corp', 'ingeniero en proyectos', '1985-03-10', 'cb6da0478d');
INSERT INTO estudiante VALUES ('17153934', 17153934, 'v', 'Ysbet', 'Daymar', 'Ottamendi', 'Yanes', '02123512919', '04123817262', 'Calle Libertador Sector La Vuelta Calle Los Olivos Catia La Mar estado Vargas', 'Aeropuerto Inter Maiquetia', 'Agente de Equipaje', '1981-09-12', '7cf2b04096');
INSERT INTO estudiante VALUES ('17158282', 17158282, 'v', 'Daniela', 'Jeniree', 'trejo', 'gonzalez', '02123777931', '04126003351', 'sabana grande, av las cacias, edif acacia, piso 1, apt b2', 'Independiente', 'Independiente', '1985-11-02', 'b890ae3e40');
INSERT INTO estudiante VALUES ('17166021', 17166021, 'v', 'Joseph', 'Andreson', 'Aponte', 'Arias', '02128160276', '04262044928', 'Urb. LOmas de Urdaneta. Bloq. 10. Piso 12. Apto, 123. Catia', 'Hospital Maternal Infantil de Petare', 'Medico', '1986-03-26', 'e3d8ca4755');
INSERT INTO estudiante VALUES ('17215171', 17215171, 'v', 'jessica', 'karina', 'reyna', 'figuera', '04162140323', '02128160276', 'urb. lomas de urdaneta bloque 10 piso 12 apto. 123 catia', 'hospital materno infantil del este', 'medico', '1983-06-25', 'e5aa008000');
INSERT INTO estudiante VALUES ('17268270', 17268270, 'v', 'Julio', 'Cesar', 'Vidal', 'Pantoja', '02122513973', '04162149707', 'Palo Verde', 'Inmobiliaria Abraham', 'corredor de bienes raices', '1984-06-28', 'dd55c8891d');
INSERT INTO estudiante VALUES ('17343908', 17343908, 'v', 'jumger', 'jose', 'reyes', 'gutierrez', '04263129266', '00000000000', 'el valle zamora escalera 3 casa 10 ', 'ucv cafetin', ' empleado', '1985-05-23', 'c3f092d7ca');
INSERT INTO estudiante VALUES ('17351287', 17351287, 'v', 'Ely', 'Ysabel', 'Romero', 'Medina', '02129780011', '04167146591', 'Avenida Urdaneta. Esquina Toro a Cardones Residencia 76-2 Piso 3 Apto 3 La Candelaria. Caracas.', 'Diseños Cotoperi', 'Coordinadora', '1984-11-27', '4e3d0380e1');
INSERT INTO estudiante VALUES ('17386985', 17386985, 'v', 'eusse', '  andre', 'schneider', '  ayala', '04269744388', '04269744488', 'av. moran casa 30 catia parroquia sucre', 'universidad central de venezuela', 'Estudiante', '1986-12-22', '0decfcdb5a');
INSERT INTO estudiante VALUES ('17474240', 17474240, 'v', 'Yomaira', 'Lisbeth', 'Rodriguez', 'Marin', '02396119439', '04162143141', 'Cambambe - Ed. Miranda', 'estudiante', 'estudiante', '1982-09-18', '1dc3f50ee1');
INSERT INTO estudiante VALUES ('17478216', 17478216, 'v', 'Yisel', 'Dayana', 'Perez', 'Carreño', '02128828416', '04127158247', 'Rafael Garcia Carballo Sector 2 Vereda 2 Casa 4. urbanizacion Caricuao', 'UE Instituto Humanitas', 'Docente', '1986-09-23', '18cf67a7e3');
INSERT INTO estudiante VALUES ('17531471', 17531471, 'v', 'Anally', 'Del Valle', 'Cruz', 'Lineros', '04167268061', '02122441218', 'Urb. Turumo. Av. Turumito. N. 155.', 'Caracas', 'Productora Audiovisual Independiente', '1986-03-28', '1cadbd5cc1');
INSERT INTO estudiante VALUES ('17533289', 17533289, 'v', 'dayana', 'karolina', 'delgado', 'gonzalez', '02124090510', '04264020376', 'la california', 'estudiante', 'estudiante', '1987-08-25', 'dcbc2d0300');
INSERT INTO estudiante VALUES ('17560355', 17560355, 'v', 'Josue', 'Alexander', 'Fuentes', 'Urdaneta', '02128648026', '04263117849', 'Manicomio de Veracruz a Casilla casa 1632 La Pastora Caracas', ' dulce  Indira', 'Encargado de ventas', '1986-12-17', '13f56a7044');
INSERT INTO estudiante VALUES ('17562116', 17562116, 'v', 'jhonathan', 'davyd', 'rovario', 'vasquez', '02124624289', '04129997540', 'Av Jose Angel Lamas, Res. Las Guacamayas, torre b, piso 4, apt 41-b, san agustin', 'Independiente', 'Independiente', '1985-10-01', '73034dfbcd');
INSERT INTO estudiante VALUES ('17563504', 17563504, 'v', 'Tomas', 'Antonio', 'Batista', 'Perez', '02122659039', '04142233768', 'Chacao', 'estudiante', 'estudiante', '1987-01-29', 'c2c894ac84');
INSERT INTO estudiante VALUES ('17576864', 17576864, 'v', 'angie', 'sirenie', 'romero', 'matute', '02122008026', '04241733301', 'av sucre de los dos caminos', 'ittaca corp', 'ingeniero', '1986-01-23', '3cb5485b1c');
INSERT INTO estudiante VALUES ('17667183', 17667183, 'v', 'Ana', 'Elizabeth', 'Gutierrez', 'Gómez', '04165823743', '04165823743', 'Urb las acacias, quinta naiguatá, av minerva, parroquia san pedro', 'Ucv', 'Estudiante', '1989-10-20', 'd3074aec1a');
INSERT INTO estudiante VALUES ('17691996', 17691996, 'v', 'Yerarding', 'Del Valle', 'Perez', 'Sosa', '02128938084', '04129978808', 'Calle libertador sector la vuielta, barrio los olivos n|27 f, Catia la Mar. Edo. Vargas', 'Aereopuerto Internacional', 'Agente de Trafico', '1985-07-09', '0a02ea0b01');
INSERT INTO estudiante VALUES ('17718563', 17718563, 'v', 'anthony', 'jose', 'paredes', 'mendez', '04161961058', '02128586741', '23 de enero sanai bloque 32 piso 7 letra a 4701', 'centro empresarial del este chacao', 'representante de atencion al cliente', '1986-02-20', 'ba0b675412');
INSERT INTO estudiante VALUES ('17741716', 17741716, 'v', 'Deinalis', 'del Valle', 'Castillo', 'Ruiz', '02125802955', '04141726284', 'Calle guaicaipuro artigas', 'Fundacion en idiomas', 'administrativo', '1986-04-26', 'e44f442a5d');
INSERT INTO estudiante VALUES ('17754294', 17754294, 'v', 'juan', ' alberto', 'sanabria', ' izaguirre', '02124837812', '04165836216', 'av. baralt, esquina bucare. edificio conjunto junin', 'movilnet', 'ejecutivo de atencion telefonica', '1987-10-05', '79c50b197c');
INSERT INTO estudiante VALUES ('17793954', 17793954, 'v', 'shair', 'arelis', 'fernandez', 'guillen', '02127449455', '04142715592', 'caricuao', 'estudiante', 'estudiante', '1986-05-16', 'd82a86c001');
INSERT INTO estudiante VALUES ('17802853', 17802853, 'v', 'aini', 'rubi', 'davila', 'rodriguez', '04264176123', '02128834386', 'parroquia la dolorita urb lira las casitas calle lira casa 6 vereda 13 ', 'trabajo artesana', 'independiente', '1986-07-18', '73379fed5f');
INSERT INTO estudiante VALUES ('17803163', 17803163, 'v', 'Omar', 'Alberto', 'Bazan', 'Oliva', '02127541313', '04127226505', 'Colinas de Bello Monte. Avenida Caurimare. Quinta Ana Valentina. Caracas.', 'Ecovak Security', 'Director', '1986-10-10', '62a28619ee');
INSERT INTO estudiante VALUES ('17823657', 17823657, 'v', 'Jesus', 'Daniel', 'Diaz', 'Abreu', '02126629787', '04241983588', 'LOs Chaguaramos,Edif Garibaldi, piso 3, apt 5', 'Santos y Asociados', 'Contador Publico', '1985-02-22', '32308b11b2');
INSERT INTO estudiante VALUES ('17906399', 17906399, 'v', 'Augusto', 'Arturo', 'Ebratt', 'Chacón', '04262056549', '02127157974', 'Av. Principal con calle Haticos. Res. Sandra. N. 39. Piso Sótano. Urb. Guaicoco. Municipio Sucre.', 'Instituto Aeronáutico', 'Pasante', '1968-06-01', 'e443adf99f');
INSERT INTO estudiante VALUES ('17932338', 17932338, 'v', 'Desiree', 'Antonela', 'Barrios', 'Pastran', '02124717498', '04264507689', 'Montalban', 'Ubv', 'medico', '1986-04-12', 'b54968df21');
INSERT INTO estudiante VALUES ('17966102', 17966102, 'v', 'Julia', 'Riginia', 'Mejicano', 'Arteaga', '04241657844', '04167264888', 'Petare, Barrio San Blas, casa 18', 'No trabaja', 'No trabaja', '1988-07-13', '45d5d619fb');
INSERT INTO estudiante VALUES ('17983622', 17983622, 'v', 'Maria', 'Carolina', 'Fajardo', 'Fajardo', '04125547229', '02127300387', 'Av. Este Alta Florida. Casa Maritza. ', 'No trabajo', 'No trabajo', '1987-01-06', '9530baa3e7');
INSERT INTO estudiante VALUES ('18001076', 18001076, 'v', 'Geisha', 'Yineth', 'Hernández', 'Farías', '04143396778', '02125782168', 'Av. Universidad. Esquina Monroy a Misericordia. Res. Dorabel. Parque Carabobo.', 'Ministerio de Comunas', 'Periodista', '1988-06-21', 'ce6f182dbd');
INSERT INTO estudiante VALUES ('18004816', 18004816, 'v', 'david', 'jose', 'rivas', 'castillo', '04241634895', '00000000000', 'petare', 'directagrup', 'opetador telefonico', '1988-03-05', '9f0f010bbc');
INSERT INTO estudiante VALUES ('18025015', 18025015, 'v', 'pablo', 'alejandro', 'fermin', 'morales', '04122384927', '02126935450', 'av roosvert los rosales ', 'independiente', 'independiente', '1988-03-23', 'ff5c232747');
INSERT INTO estudiante VALUES ('18027541', 18027541, 'v', 'carol', 'yuliana', 'barreto', 'galvis', '02128627302', '04127041445', 'san jose del avila', 'universidad alejandro humboldt', 'sub directora', '1985-10-02', '1b50b7b159');
INSERT INTO estudiante VALUES ('18039468', 18039468, 'v', 'Yefferson', 'Jhavier', 'Lugo', 'Lugo', '02127934059', '04269133494', 'Av las palmas, edif. palmoral, piso 4, apto4-1', 'Inces sede', 'Auxiliar de oficina', '1987-12-24', '793f15f20e');
INSERT INTO estudiante VALUES ('18042321', 18042321, 'v', 'Kleiner', 'Antonio', 'Pacheco', 'Mendoza', '02125247816', '04242304008', '23 de Enero, Zona Central Bloque 22 piso12 1217 Caracas', 'Lacteos Los Andes', 'Supervisor', '1982-08-15', '23d0b85fae');
INSERT INTO estudiante VALUES ('18104664', 18104664, 'v', 'gerile', 'no', 'montoya', 'no', '04245515716', '02127081098', 'el valle res don pedro', 'consejo federarl de gobierno', 'planificadora', '1985-05-24', '42fd382bea');
INSERT INTO estudiante VALUES ('18223977', 18223977, 'v', 'Kassen', 'Argenis', 'Becerra', 'Noguera', '04242467587', '04242467587', 'Avenida Leonardo Ruiz Pineda Res Vuelta del casquillo Edf 1 piso 6 apto 64: San Agustin del sur', 'Trabajo Independiente', 'Trabajo Independiente', '1989-06-04', 'a18935b523');
INSERT INTO estudiante VALUES ('18364383', 18364383, 'v', 'Yusbeth', 'Maria', 'Zambrano', 'Bermudez', '02123101167', '04241696647', 'El Valle , Av Intercomunal,Casa Numero 50', 'Hotel Marriot', 'Gerente de Ventas', '1985-03-10', '74851df88b');
INSERT INTO estudiante VALUES ('18364537', 18364537, 'v', 'jean', 'carlos', 'delgado', 'rojas', '02124324961', '04125905913', 'caricuao ud4 terraza leon de payara bloque 25 piso 5 apto 5-02', 'hotel shelter suites', 'superivisor de restautante', '1986-10-27', '79ab4cb18d');
INSERT INTO estudiante VALUES ('18388749', 18388749, 'v', 'diana', 'carmin', 'zurita', 'gonzalez', '04268125165', '02392129980', 'nueva cua calle 5 sector 4 casa 65 valles del tuy ', 'producciones carmin', 'presidenta', '1988-02-01', '0769268480');
INSERT INTO estudiante VALUES ('18388780', 18388780, 'v', 'keila', 'gabriela', 'escobar', 'flores', '02392240130', '04268195470', 'urb. mata de coco terraza III charallave', 'vocem', 'operadora contact center', '1988-04-16', '85b815760d');
INSERT INTO estudiante VALUES ('18441611', 18441611, 'v', 'Emilia', 'Carolina', 'Tavera', 'Romero', '04163293227', '04165481811', 'Plaza venezuela, res estudiantil', 'Ucv', 'Estudiante', '1986-09-06', 'f259b2f54f');
INSERT INTO estudiante VALUES ('18445456', 18445456, 'v', 'Adriana', 'Karina', 'Rojas', 'Lievano', '02125420394', '04263062834', 'La Hoyada avda universidad edif centro ejecutivo piso 1 apto 17 caracas ', 'Metamax', 'Operadora telefono', '1989-05-24', '2181b6975e');
INSERT INTO estudiante VALUES ('18641635', 18641635, 'v', 'Nelson', 'David', 'ramirez', 'hernandez', '04262051126', '02127425908', 'Plaza Venezuela,Residencias Estudiantiles, piso 6', 'Ministerio para las Comunas', 'Analista', '1987-09-24', 'b215fb97cb');
INSERT INTO estudiante VALUES ('18676151', 18676151, 'v', 'Michael', 'Michael', 'Wetzstein', 'Acosta', '02124324046', '04168136551', 'avenida de la hacienda, ud5 Caricuao', 'Altamira', 'Instructor', '1987-03-26', '181bd3d634');
INSERT INTO estudiante VALUES ('18728132', 18728132, 'v', 'carlos', 'david', 'guanque', 'no', '04241239402', '00000000000', 'caracas las adjuntas', 'comercio', 'empleado', '1989-06-04', 'e6fa32dacd');
INSERT INTO estudiante VALUES ('18745220', 18745220, 'v', 'yennifer', 'no', 'calderon', 'avendaño', '02126720482', '04268155725', 'el valle', 'caprica', 'contadora', '1989-04-23', '5ae6dc1980');
INSERT INTO estudiante VALUES ('18753791', 18753791, 'v', 'Melanie', 'Melanie', 'Reaño', 'Ondarroa', '02125824628', '04242821036', 'sector la rosa, via valle arriba, residencias country villa, calle i, casa 02', 'Ubv, pnfe', 'docente', '1988-01-26', 'cfeb644921');
INSERT INTO estudiante VALUES ('18809028', 18809028, 'v', 'Eulynel', 'Del valle', 'Hernandez', 'Rivas', '02392483117', '04141464545', 'Urb. la estrella, edif jupiter, 5a,piso 51, charallave, edo miranda', 'Estudiante', 'Ucv', '1989-09-14', '6df85bb779');
INSERT INTO estudiante VALUES ('18819097', 18819097, 'v', 'pedro', 'salvador', 'corporan', 'durante', '04241461516', '11111111111', 'gato negro torres de catia caracas ', 'supermercados', 'Encargada', '1970-03-18', '09ab7eff9f');
INSERT INTO estudiante VALUES ('18841566', 18841566, 'v', 'Susheidy', 'Stefania', 'Monrroe', 'Rangel', '04122259328', '02392259425', 'Urb. Casa Blanca. Ocumare del Tuy. Edo. Miranda.', 'Centro Comercial Líder', 'Gerente', '1987-09-15', '90b005a3c1');
INSERT INTO estudiante VALUES ('18912245', 18912245, 'v', 'sara', 'esther', 'velasquez', 'robles', '02127302401', '04141521219', 'urb. avila calle coromoto res. stella matutina alta florida caracas.', 'estudia', 'estudiante', '1988-07-13', 'ec63db9cca');
INSERT INTO estudiante VALUES ('18932853', 18932853, 'v', 'kendra', 'ailith', 'garcia', 'paredes', '04125688756', '02124734445', 'el paraiso', 'akri lider', 'cajera', '1989-10-18', '3cf22be9ee');
INSERT INTO estudiante VALUES ('18994269', 18994269, 'v', 'ricardo', 'ramon', 'diaz', 'corrales', '02126320078', '04140165001', 'av nueva granada', 'casa de cambio', 'contable', '1989-04-27', 'f59462ae0f');
INSERT INTO estudiante VALUES ('19015153', 19015153, 'v', 'Jeffrey', 'Alexander', 'Pulido', 'García', '00000000000', '00000000000', 'Av. Páez. El Paraíso. Frente al Pedagógico de Caracas.', 'Caracas', 'Comerciante', '1988-10-11', '93163bccc7');
INSERT INTO estudiante VALUES ('19015578', 19015578, 'v', 'Paola', 'Mercedes', 'Vega', 'Guzmán', '04241485013', '02123211848', 'Calle Rocío. El Rincón. Casa n.34. Los Teques.', 'No trabajo', 'No trabajo', '1989-07-25', '2b060bbc3d');
INSERT INTO estudiante VALUES ('19060343', 19060343, 'v', 'bryan', 'eduardo', 'barrios', 'grafe', '02125748005', '04129104684', 'Guarenas, Nueva Casarapa,edi 7, apt 744', 'Red de apoyo por la justicia y la paz', 'Personal Operativo', '1988-12-10', '0ed6ad523b');
INSERT INTO estudiante VALUES ('19065524', 19065524, 'v', 'Damelis', 'Daniela', 'Vera', 'Bolivar', '04269183065', '04269183065', 'Lomas de urdaneta, propatria', 'Del hogar', 'Ama de casa', '1989-03-01', '29b04103a7');
INSERT INTO estudiante VALUES ('19066805', 19066805, 'v', 'abraham', 'isaac', 'suarez', 'bermudes', '04164063288', '02124224210', 'el junquito km 14 urb iberoamericana sector las terrazas casa n 6', 'no posee', 'no posee', '1990-11-14', 'b3c88e32bc');
INSERT INTO estudiante VALUES ('19087326', 19087326, 'v', 'leonardo', 'jose', 'fernandez', 'julio', '04264137112', '02125770751', 'la candelaria', 'periodico voce de italia', 'editor digital', '1971-05-07', '30d074b494');
INSERT INTO estudiante VALUES ('19148540', 19148540, 'v', 'Karely', 'Katherine', 'Datica', 'Rubio', '02127449455', '04127254914', 'Caricuao, UD 2 Zona A Terraza 38 Casa °3. Caracas', 'Estudiante', 'Estudiante', '1987-02-20', '9f234ef41b');
INSERT INTO estudiante VALUES ('19195164', 19195164, 'v', 'Rafael', 'Ernesto', 'Betancourt', 'Muñoz', '01214613337', '04122091353', 'Av San Martin, conjunto res. San Martin, torre Junin', 'Teatro Cantaclaro', 'Operador de cónsola', '1989-07-29', '9bbbdf0976');
INSERT INTO estudiante VALUES ('19195434', 19195434, 'v', 'barbra', 'vivana', 'rodriguez', 'blanco', '04267994347', '02124341855', 'caricuao ude 2 bloque 27 escalera 1 apartamento 01 planta baja ', 'no posee', 'no posee', '1990-12-14', 'bf31194947');
INSERT INTO estudiante VALUES ('19199979', 19199979, 'v', 'zully', 'karina', 'oliveira', 'paredes', '02126681500', '04126399423', 'los samanes', 'estudiante', 'estudiante', '1990-09-04', '5ec13af607');
INSERT INTO estudiante VALUES ('19208506', 19208506, 'v', 'pedrimar', 'luzviera', 'diaz', 'godoy', '04144258627', '02128867152', 'los chaguaramos  av las ciencias res monte azil', 'no posee', 'no posee', '1990-02-06', '45d364c867');
INSERT INTO estudiante VALUES ('19212586', 19212586, 'v', 'Nayibis', 'Carolina', 'Ayos', 'Barrios', '04142278378', '02127930973', 'Urb. Lecumberry. Casa 288. Cua - Edo. Miranda.', 'Caracas', 'Asistente Administrativo', '1984-10-31', '43e0baefa4');
INSERT INTO estudiante VALUES ('19255885', 19255885, 'v', 'geraldine', 'madelein', 'morillo', 'ibarra', '04269160693', '04127184840', 'principal av migel angel colinas de bello monte ', 'independiente', 'independiente', '1987-12-15', 'cc54d0d442');
INSERT INTO estudiante VALUES ('19292435', 19292435, 'v', 'pavlowa', 'andreina', 'rengifo', 'blanco', '04268148475', '02126259762', 'urb el guamal calle sucre km 12 el junquito casa marloba', 'no trabaja', 'no trabaja', '1990-06-16', 'c12fdc0743');
INSERT INTO estudiante VALUES ('19292438', 19292438, 'v', 'Wilkins', 'Enrique', 'Canzone', 'Benitez', '04163835963', '04163835963', 'Edif Dalia, pisso 22-d, Los Jardines del Valle, calle 11, Pesidencia LOs Jardines', 'No trabaja', 'No trabaja', '1988-12-27', '89166e28d0');
INSERT INTO estudiante VALUES ('19294427', 19294427, 'v', 'gilbert', 'javier', 'aponte', ' aponte', '04125581759', '04242219495', 'palo verde', 'independiente', 'artesano', '1989-03-09', '9a18b4c2e0');
INSERT INTO estudiante VALUES ('19371391', 19371391, 'v', 'Joel', 'Argemiro', 'Mora', 'Arias', '04269159159', '02127811036', 'Av. Trujillo. Zona Central. Bloq. 20. Apto. C-3. Piso 2.', 'Aeropuerto', 'Transporte Ejecutivo', '1988-05-03', '41af4caf3a');
INSERT INTO estudiante VALUES ('19378202', 19378202, 'v', 'giuliana', 'alexandra', 'pezzia', 'no', '02126318806', '04122078157', 'el cementerio, parroquia santa rosalia', 'estudiante', 'estudiante', '1990-03-18', '852e185551');
INSERT INTO estudiante VALUES ('19378752', 19378752, 'v', 'Maria', 'Fernanda', 'Salaya', 'La Cruz', '02128387494', '04129612308', 'Minas de Baruta', 'no trabaja', 'no posee', '1990-11-12', 'ad05106de8');
INSERT INTO estudiante VALUES ('19398177', 19398177, 'v', 'Cristia', 'Juan', 'Guerrero', 'Bordones', '02128607215', '04242636213', 'parroquia altagracia esquiba paraiso edificio efigenia apartamento 11 caracas', 'Estudiante', 'Estudiante', '1988-07-01', 'c40ff2008e');
INSERT INTO estudiante VALUES ('19418205', 19418205, 'v', 'fabricio', 'andres', 'onsalo', 'rivera', '02392483117', '04147975059', 'urb. la estrella charallave.', 'ucv', 'estudiante', '1989-07-07', 'dbc89afd7a');
INSERT INTO estudiante VALUES ('19429046', 19429046, 'v', 'Angélica', 'Angélica', 'Unda', 'Galeano', '04263210985', '02394150388', 'Urb. Betania Caribe. Via Charallave - Cúa. Cúa. Edo. Miranda. ', 'Universidad Central', 'Estudiante', '1991-06-05', '3d22ffa163');
INSERT INTO estudiante VALUES ('19499135', 19499135, 'v', 'sara', 'jakelin', 'hermoso', 'silva', '04144633873', '00000000000', 'las adjuntas parroquia macarao ', 'no trabaj', 'no trbaja', '1985-10-17', '4af71ab81d');
INSERT INTO estudiante VALUES ('19507237', 19507237, 'v', 'jean', 'claude', 'nova', 'brito', '04165375335', '04242451858', 'el junquito km 8 sector canaima n casa 11', 'independiente', 'independiente', '1991-07-16', '6513c0a743');
INSERT INTO estudiante VALUES ('19511927', 19511927, 'v', 'Whitne', 'Airleen', 'Mendoza', 'Leon', '02125523105', '04122274424', 'avenida fuerzas armadas residencias serenisima torre sur ', 'Estudiante', 'Estudiante', '1990-11-19', '8b77857abb');
INSERT INTO estudiante VALUES ('19518496', 19518496, 'v', 'kelly', 'thatiana', 'quintero', 'aviles', '02126817587', '00000000000', 'av ppa coche edif la estampa piso 1 04', 'callcenter', 'teleoperadora', '1990-03-13', '226a34e6b4');
INSERT INTO estudiante VALUES ('19531282', 19531282, 'v', 'Andrea', 'Daniela', 'Hernández', 'Motamayor', '04129816664', '02128867152', 'Res. Monte Azul. Hab. 20. Piso 2. Los Chaguaramos. Caracas.', 'Universidad Central', 'Estudiante', '1988-05-14', 'a566e55881');
INSERT INTO estudiante VALUES ('19561302', 19561302, 'v', 'Govinda', 'Rama', 'Villalobos', 'Ruano', '02123566201', '04168192727', 'Urb. guaracarumbo, edif. 17, apto0006, catia la mar', 'Ubv', 'Estudiante', '1987-06-17', 'aa253b3891');
INSERT INTO estudiante VALUES ('19564542', 19564542, 'v', 'Jessica', 'Johanna', 'Cueto', 'Hernandez', '02128345894', '04128228526', 'Guaracarumbo - Vargas', 'Igvsb', 'digitalizadora', '1990-12-27', '838076259b');
INSERT INTO estudiante VALUES ('19573491', 19573491, 'v', 'Andrea', 'Estefania', 'Manzanilla', 'Briceño', '02124908048', '04120305964', 'Las Minas de Baruta, calle el Rosario Callejon Anare. Casa N° 3', 'Estudiante', 'Estudiante', '1991-10-17', '4324865dbd');
INSERT INTO estudiante VALUES ('19581348', 19581348, 'v', 'Victor', 'Julio', 'Martinez', 'Fagundez', '02128584038', '04124574657', '23 de Enero, Bloque6,apt a87', 'Academia de Musica Juan Sebastian bach', 'Profesor de musica', '1989-03-11', 'd792fa9412');
INSERT INTO estudiante VALUES ('19587512', 19587512, 'v', 'nagib', 'antoine', 'el richani', 'riaño', '02123835578', '04241980956', 'colinas de carrizal urb. montaña lata piso 15 apto 15-3. municipio carrizal. edo. miranda', 'no posee', 'no posee', '1991-08-05', 'bd4f462ed7');
INSERT INTO estudiante VALUES ('19614495', 19614495, 'v', 'wilmer', 'abrahan', 'ramirez', 'perez', '02126721529', '04141198296', 'sector los cardones calle san andres casa nro. 63 el valle', 'directagroup', 'atencion al cliente', '1989-03-01', '4aedfd92e0');
INSERT INTO estudiante VALUES ('19642773', 19642773, 'v', 'Naurelkis', 'Antonieta', 'Esteves', 'Soto', '04149422070', '02127623367', 'Av. Francisco Solano. Res. Solano Torre A. Piso 6. Apto. 0611. Sabana Grande.', 'Universidad Central', 'Estudiante', '1990-01-31', 'aed56d67c7');
INSERT INTO estudiante VALUES ('19650318', 19650318, 'v', 'stuhar', 'isael', 'cedeño', 'peña', '02123778877', '04126046668', 'barrio jose felix ribas zona 6 sector la capilla petare', 'ubv', 'Estudiante', '1991-01-05', '13bff4b436');
INSERT INTO estudiante VALUES ('19650399', 19650399, 'v', 'alnaldo', 'vicente', 'noguera', 'sifontes', '02128397757', '04129288575', 'hoyo de la puerta, municipio baruta, edo. miranda', 'fundacion bacedi kiyozu', 'editor', '1990-11-20', '6b13b73ddb');
INSERT INTO estudiante VALUES ('19672699', 19672699, 'v', 'stephenson', 'julian', 'pino', 'viafara', '02129101734', '04164186834', 'Parroquia Coche, La Rinconada, REsidencia Cacique Tiuna, 2da etapa, edif 31,piso 1-b apt 31', 'policia de baruta', 'oficial', '1989-07-16', '8d9192c741');
INSERT INTO estudiante VALUES ('19692840', 19692840, 'v', 'difda', 'elhena', 'constan', 'rosales', '04261215319', '02129458106', 'la trinidad ', 'no trabaja', 'no trabaja', '1991-11-02', '00a948b12f');
INSERT INTO estudiante VALUES ('19710582', 19710582, 'v', 'soimar', 'del carmen', 'pocheco', 'carrillo', '02128787972', '04242441434', 'brisas de propatria calle sucre n° de casa 08-17', 'no', 'no', '1991-07-08', 'a96974a9f0');
INSERT INTO estudiante VALUES ('19711616', 19711616, 'v', 'Yohaglis', 'Nazareth', 'Maestre', 'no', '02124143767', '04164246219', '23 de enero zona central, detras de bloque 26 barrio camboya callejon 1er de mayo casa 33', 'Cantv', 'Operadora', '1990-05-25', 'be497adaa9');
INSERT INTO estudiante VALUES ('19711843', 19711843, 'v', 'Ely', 'Ayerim', 'Bueno', 'Unamo', '02128788988', '04268171070', 'Km 3 del junquito, niño jesus, olivett IV. Etapa.', 'Hospital Jesus Yerena', 'Auxiliar', '1991-09-11', '2800868444');
INSERT INTO estudiante VALUES ('19717657', 19717657, 'v', 'Mirian', 'Virginia', 'Sucre', 'Rodríguez', '04120879526', '00000000000', 'Av. Presidente Medina. Cruce calle Comercio. Edif. Marfil.', 'Universidad Central', 'Estudiante', '1990-08-15', '2f8439f0bf');
INSERT INTO estudiante VALUES ('19720670', 19720670, 'v', 'Emily', 'del carmen', 'Ramirez', 'Quintero', '02124711592', '04241511969', 'Urb la guayanita el paraiso calle la guayanita casa 3 caracas', 'Liceo fernando magallanes', 'Docente', '1991-09-01', 'c5188b91e0');
INSERT INTO estudiante VALUES ('19733686', 19733686, 'v', 'Gabriel', 'Alejandro', 'Guerrero', 'Useche', '02126387841', '04242358325', 'Avda Guzman Blanco Edif Tito Salas piso 13 apto 6 Coche Caracas', 'Inces', 'Seguridad', '1991-01-06', 'e80cc11413');
INSERT INTO estudiante VALUES ('19736418', 19736418, 'v', 'fredy', 'jose', 'manrique', 'blanco', '04242186842', '02128632293', 'la pastora ', 'no trabaja', 'no trabaja', '1992-02-08', 'f0c2b3feef');
INSERT INTO estudiante VALUES ('19753874', 19753874, 'v', 'Aurangelyn', 'Adriana', 'Mata', 'Rivas', '04126321432', '04126321432', 'Plaza Venezuela, calle Las Acacias', 'Heners publicida', 'Publicista', '1989-01-07', '7d0378fa14');
INSERT INTO estudiante VALUES ('19754615', 19754615, 'v', 'Renier', 'Jose', 'Laya', 'Blanco', '04160969582', '02128789194', 'Km. 3. Vía El Junquito. Barrio Niño Jesús.', 'Altamira', 'Anfitrión de Servicio', '1990-04-02', 'a052ff5d64');
INSERT INTO estudiante VALUES ('19764233', 19764233, 'v', 'valery', 'antonelly', 'john', 'suarez', '02398085236', '04263103757', 'valles del tuy', 'estudiante', 'estudiante', '1989-10-11', 'f1cf224493');
INSERT INTO estudiante VALUES ('19789602', 19789602, 'v', 'maria', 'de los angeles', 'giner', 'belisario', '02129931187', '04166359852', 'las mercedes', 'bandes', 'administrativo', '1991-02-18', 'b9226deefb');
INSERT INTO estudiante VALUES ('19819715', 19819715, 'v', 'nakari', 'xiober', 'garcia', 'maestre', '02126724238', '04167062332', 'calle1 de los jardines del valle. el valle', 'teatro intinerante', 'actris', '1992-05-05', 'b6fc57fe8d');
INSERT INTO estudiante VALUES ('19820399', 19820399, 'v', 'luismar', 'virginia', 'rodriguez', 'herrrera', '02124516369', '04163216840', 'av. san martin edificio mil centro torre c piso 12', 'estudia', 'estudiante', '1989-10-20', '644acabfe8');
INSERT INTO estudiante VALUES ('19851664', 19851664, 'v', 'carlos', 'eduardo', 'rodriguez', 'pinzon', '04262160219', '02129101202', 'av jose antonio paez residencia gabriela el paraiso', 'banco de venezuela', 'supervisor', '1991-05-06', '18ae75aada');
INSERT INTO estudiante VALUES ('19852826', 19852826, 'v', 'Yoandy', 'Jose', 'Medina', 'Pirela', '02128419517', '04268219680', 'Avenida intercomunal de antimano, carapita, sector el progreso', 'Estudiante', 'Estudiante', '1991-08-03', '5981e6fe9f');
INSERT INTO estudiante VALUES ('19868074', 19868074, 'v', 'MIguel', 'Eduardo', 'Padilla', 'Sosa', '04169079241', '02122432387', 'La California. Av. Sanz. Edif. Boston. ', 'No trabajo', 'No trabajo', '1990-11-01', '047f6d2538');
INSERT INTO estudiante VALUES ('19930990', 19930990, 'v', 'Geixy', 'Marian', 'Solorzano', 'Moreno', '02124251599', '04162067712', 'Los Teques La matica, Guaicaipuro.', 'Estudiante', 'Estudiante', '1991-08-06', '43aae6ce82');
INSERT INTO estudiante VALUES ('19932410', 19932410, 'v', 'Daryelis', 'Anaidid', 'Acosta', 'Carrasquel', '02123392673', '04267064758', 'Panamericana - Coche', 'Directv', 'teleoperadora', '1989-12-27', '84fe385558');
INSERT INTO estudiante VALUES ('19965464', 19965464, 'v', 'Josephlina', 'nazareth', 'rivas', 'gonnella', '02123219863', '04123770786', 'Los Teques, Municipio Guaicaipuro, Residencias el Encanto, piso 11 apt b6', 'Estudiante', 'Estudiante', '1990-06-27', 'acd9836a1e');
INSERT INTO estudiante VALUES ('19966085', 19966085, 'v', 'Kelly', 'Alejandra', 'Landaeta', 'Goicochea', '02127817782', '04125949001', 'Calle Principal Simon Rodriguez, Urb Pinto Salinas Bloque 1 edf 3 piso 1 apto 14', 'Universidad Bolivariana de Venezuela', 'Secretaria', '1991-06-19', '7948d9b82f');
INSERT INTO estudiante VALUES ('19998199', 19998199, 'v', 'andreina', 'Carolina', 'Girott', 'Diaz', '02124931429', '04269147204', 'Av Este 16, Equina Tablita a Sordo Casa28-1 Parroquia Santa Rosalia Caracas', 'Estudiante', 'estudiante', '1991-10-08', 'efb2b399f6');
INSERT INTO estudiante VALUES ('20095455', 20095455, 'v', 'hensay', 'genesis', 'vasquez', 'gudiño', '04241368089', '04241368089', 'san antonio de los altos, urb. las cumbres 8-B', 'no', 'no', '1995-05-05', 'aff5404098');
INSERT INTO estudiante VALUES ('20127400', 20127400, 'v', 'freddy', 'orlando', 'Santaella', 'Rosales', '02123101365', '04266175399', 'Av SAn Martin, La quebradita II,edif 5, apt 24a', 'Estudiante', 'Estudiante', '1990-02-15', 'a8592fe094');
INSERT INTO estudiante VALUES ('20127441', 20127441, 'v', 'maikel', 'jearmir', 'di martino', 'benutez', '04165520157', '02126412214', 'av sucre agua salud calle bachche casa 23', 'movistar', 'teleoperador', '1991-08-09', '3e5e19e853');
INSERT INTO estudiante VALUES ('20190516', 20190516, 'v', 'daniel', 'leonardo', 'rodriguez', 'claveli', '02123262950', '04128285950', 'av. ppal de playa grande catia la mar edo. vargas', 'no trabajo', 'no posee', '1991-04-02', '9860e589ac');
INSERT INTO estudiante VALUES ('20209588', 20209588, 'v', 'luisana', 'gabriela', 'aparicio', 'no', '02122631217', '04169171924', 'la bandera', 'los ruices', 'teleoperador', '1990-05-18', '73df77cae9');
INSERT INTO estudiante VALUES ('20210105', 20210105, 'v', 'Alan', 'Eduardo', 'Ruesta', 'Zambrano', '02123610064', '04262216503', 'guarenas calle la guairita residencias la guairita edificio laurel piso 6  6 f4', 'Estudiante', 'Estudiante', '1990-10-14', '1a031912f8');
INSERT INTO estudiante VALUES ('20291286', 20291286, 'v', 'carla', 'desiree', 'mora', 'ceron', '02125161409', '04268210502', '23 de enero sector el mirador andres eloy blanco casa 3', 'liceo vicente emilio', 'estudiante', '1990-12-25', '9bbd480887');
INSERT INTO estudiante VALUES ('20307169', 20307169, 'v', 'Neyquer', 'Neyquer', 'Ponce leon', 'Pimentel', '04261019433', '04261019433', 'Carretera las adjuntas barrio la gran parada callejon todos unidos casa 61', 'Trabajo independiente', 'Cursos de aleman', '1992-01-20', '9f50e495aa');
INSERT INTO estudiante VALUES ('20362454', 20362454, 'v', 'daniel', 'antonio', 'perez', 'jimenez', '02122572906', '04262815527', 'colinas de los ruices edificio las magnolias', 'estudia', 'estudiante', '1991-02-05', '8c04e70f46');
INSERT INTO estudiante VALUES ('20489202', 20489202, 'v', 'garaldine', 'carolina', 'sanchez', 'redondo', '02129874081', '04126035291', 'santa paula calle geminis edifi. fonseca III', 'escuela de acupuntura', 'estudiante', '1992-09-07', '074565f093');
INSERT INTO estudiante VALUES ('20490254', 20490254, 'v', 'Erick', 'Jose', 'Ramirez', 'Lozada', '02126719766', '04127397338', 'Calle Longaray Residencias Ceibo III. El Valle', 'Produccionas gal chacao', 'Guia', '1992-05-09', '3aeeb00a75');
INSERT INTO estudiante VALUES ('20493145', 20493145, 'v', 'angelise', 'isabel', 'rivero', 'quitero', '04242690564', '02126726152', 'av intercomunal del valle res don pedro torre a piso 2 ', 'no trabaja', 'no trabaja', '1992-02-25', '9a0e081311');
INSERT INTO estudiante VALUES ('20596697', 20596697, 'v', 'Emperatriz', 'de los Angeles', 'Rodriguez', 'Rodriguez', '04123714567', '04160128005', 'urbanizacion los naranjos casa b3 zona 3 guarenas', 'Estudiante', 'estudiante', '1990-08-02', '5455dd71c9');
INSERT INTO estudiante VALUES ('20605914', 20605914, 'v', 'Nathacha', 'Carolina', 'Gonzalez', 'Salcedo', '02126157382', '04267429066', 'Los frailes', 'Dr. Miguel Perez Carreño', 'camarera', '1989-10-26', '2f3817b5ec');
INSERT INTO estudiante VALUES ('20605915', 20605915, 'v', 'naileth', 'victoria', 'gonzalez', 'salcedo', '02126157382', '00000000000', 'los frailes de catia av sucre', 'no trabaja', 'no trasbaja', '1989-10-26', '01eadb236f');
INSERT INTO estudiante VALUES ('20614037', 20614037, 'v', 'Reynerd', 'Alejandro', 'Rebolledo', 'Delgado', '04249570091', '02127942146', 'Av. Maripérez', 'No trabajo', 'No trabajo', '1993-12-09', '8bf38cdd52');
INSERT INTO estudiante VALUES ('20615886', 20615886, 'v', 'Gerardo', 'Ranses', 'De oliveira', 'Tovar', '02127439816', '04162146181', 'Urbanizacion UD 1 Bloque 5 Escalera 2 Piso 1 Apto 103, Caricuao. Caracas.', 'Trabajo Independiente', 'tutor', '1992-02-03', 'eb94c4b41e');
INSERT INTO estudiante VALUES ('20673633', 20673633, 'v', 'anny angelica', 'veronica', 'escudero', 'graterol', '02124813565', '04125653917', 'Puente junin a pescador, av. baralt residencias Dan Torre B', 'mision sucre', 'Asistente', '1992-03-07', 'd1d0001ce4');
INSERT INTO estudiante VALUES ('20675303', 20675303, 'v', 'David', 'Asdrubal', 'Niño', 'Herrera', '02128632122', '04269195006', 'avenida sucre sector los robles, calle la loma, el manicomio ', 'Estudiante', 'Estudiante', '1991-08-23', '6ae19ca142');
INSERT INTO estudiante VALUES ('20675661', 20675661, 'v', 'Oriana', 'Carolina', 'Perez', 'Villa', '02125749603', '04143695941', 'Av. Andres Bello, Callejon Sanchez, Casa no. 24', 'Estudiante', 'Estudiante', '1991-07-25', '952bd16895');
INSERT INTO estudiante VALUES ('20676451', 20676451, 'v', 'Rafael', 'de Jesús', 'Giner', 'Belisario', '04166220163', '02129931187', 'Calle Londres. Edif. New York. Apto. B. P.B. Las Mercedes. Baruta.', 'Universidad Santa María', 'Estudiante', '1992-12-16', '39d800e020');
INSERT INTO estudiante VALUES ('20747366', 20747366, 'v', 'carlos', ' alfredo', 'belisario', ' hernandez', '02126144199', '04169259322', 'los teques', 'universidad central de venezuela', 'estudiante', '1992-11-14', 'b32ba402f1');
INSERT INTO estudiante VALUES ('20753420', 20753420, 'v', 'Vanessa', 'Alexandra', 'Colina', 'Lopez', '02126322934', '04125610768', 'El Valle', 'Sambil', 'vendedora', '1992-02-14', '70c237bb7b');
INSERT INTO estudiante VALUES ('20756538', 20756538, 'v', 'siani', 'andreian', 'martinez', 'torres', '02126936158', '04264144847', 'avenida intercomunal el valle', 'estudiante', 'estudiante', '1992-04-09', 'd686a87323');
INSERT INTO estudiante VALUES ('20761303', 20761303, 'v', 'Ileana', 'Carolina', 'Osorio', 'Acosta', '02125526595', '04264111845', 'urb. san bernardino, av anauco piso 6 apto 65.', 'estudia', 'estudiante', '1990-02-20', '22a2ab2066');
INSERT INTO estudiante VALUES ('20794768', 20794768, 'v', 'diego', 'enrique', 'perez', 'zambrano', '04242825153', '02128726786', 'el amparo calle el calvario 9 casa 13 propatria', 'no trabaja', 'no trasbaja', '1992-06-09', 'f09cf49621');
INSERT INTO estudiante VALUES ('20799233', 20799233, 'v', 'Yenileth', 'Esther', 'Mijares', 'Yanez', '02128386584', '04129728262', 'Calle la calera,sector san pascual, petare', 'sanitas', 'fisioterapeuta', '1991-07-20', '5daea9bc68');
INSERT INTO estudiante VALUES ('20826589', 20826589, 'v', 'Cynthia', 'Nayareibi', 'Castillo', 'Castillo', '02128144098', '04120194321', 'Av. el cuartel, cc con calle central, edif aida, piso 2, apto 5, catia', 'Tecnológico antonio jose de sucre', 'Estudiante', '1991-08-02', '7a939c089e');
INSERT INTO estudiante VALUES ('20827310', 20827310, 'v', 'Vanessa', 'Andreina', 'Carrillo', 'Acosta', '02128731239', '04169221925', 'Catia', 'estudiante', 'estudiante', '1993-09-22', 'd6db1dba7d');
INSERT INTO estudiante VALUES ('20827399', 20827399, 'v', 'Dari', 'Saher', 'Alvarado', 'Monserrat', '02128586372', '04269115305', 'Zona Central del 23 de enero Bloque 26-13', 'mppdp', 'analista', '1992-05-01', '18edbc0d04');
INSERT INTO estudiante VALUES ('20870063', 20870063, 'v', 'laura', 'betzabet', 'betancourt', 'muños', '04160105663', '20124613337', 'av san martin ', 'no trabaja', 'no trabaja', '1991-02-20', '60f352f810');
INSERT INTO estudiante VALUES ('20910537', 20910537, 'v', 'jose', 'yulmar', 'bermudez', 'molina', '04123132235', '02128605527', 'AV VICTORIA ', 'comerciante', 'comerciante', '1992-11-06', 'dc95e24313');
INSERT INTO estudiante VALUES ('20911395', 20911395, 'v', 'jose', 'ruben', 'alarcon', 'hernandez', '02125640624', '04127029255', 'Av Panteon, SAn Narciso Aguacatico, casa numero 32', 'No trabaja', 'No trabaja', '1992-07-20', '8de9965f79');
INSERT INTO estudiante VALUES ('20913481', 20913481, 'v', 'wilker', 'alfredo', 'rojas', 'belñtran', '04144252958', '02128602754', 'la pastora', 'sisma', 'tecnico', '1993-08-25', 'ff9c6cea8c');
INSERT INTO estudiante VALUES ('20975351', 20975351, 'v', 'Joel', 'Eufemio', 'Hernandez', 'Brito', '04125811898', '04164272040', 'Manzanares de Galipan. Casa 180', 'Estudiante', 'Estudiante', '1991-11-06', '90441ae17f');
INSERT INTO estudiante VALUES ('20976794', 20976794, 'v', 'ellys', 'joselin', 'hernandez', 'zambrano', '04167225343', '02128584040', 'zona central 23 de nero bloque 25 letra e piso 3 app318', 'no posee', 'no posee', '1993-07-10', '66d767af9a');
INSERT INTO estudiante VALUES ('21016479', 21016479, 'v', 'madeleine', 'karelys', 'grimaldi', 'herrera', '04269195931', '02128164512', 'av ppal de monterey frente a la urb montealto casa 14', 'no trabaja', 'no trabaja', '1993-02-27', 'b895ce27a9');
INSERT INTO estudiante VALUES ('21070849', 21070849, 'v', 'eymi', 'estefania', 'lara', 'lartiguez', '04241279780', '02124850405', 'av san martin calle saman a jabillo casa 18 san juan', 'banesco', 'analista', '1991-12-30', '8f7494703c');
INSERT INTO estudiante VALUES ('21103279', 21103279, 'v', 'carlos', 'tulio', 'alvarado', ' molano', '02125626121', '04142170914', 'av. fuerzas armadas esquina soccorro, edif. la trinidad piso 3 apto 32', 'ministerio de las comunas', 'apoyo tecnico administrativo', '1990-12-31', '4dbd487894');
INSERT INTO estudiante VALUES ('21117918', 21117918, 'v', 'Fernando', 'Rafael', 'Paz', 'Pires', '02399206644', '04242598182', 'San Ramon', 'Vive tv', 'Administradora', '1993-02-11', '80e77ecfae');
INSERT INTO estudiante VALUES ('21133081', 21133081, 'v', 'jhoanalys', 'betania', 'melean', 'sequera', '04241657763', '02125140500', 'mirador del este callejon cesar giron casa 305 petare mun sucre ', 'no posee', 'no posee', '1993-04-16', '7852bb1915');
INSERT INTO estudiante VALUES ('21183699', 21183699, 'v', 'ana', 'graciela', 'castillo', 'mora', '02399241972', '04168373810', 'plaza venezuela residencias estudiantiles', 'estudiante', 'estudiante', '1992-04-28', 'cbb1f2eafc');
INSERT INTO estudiante VALUES ('21283155', 21283155, 'v', 'gisel', 'paola', 'castillo', 'echanique', '04169065504', '02127512686', 'colinas de bello monte calle chopin edif candor', 'no posee', 'no posee', '1992-04-08', 'c1cf5380c3');
INSERT INTO estudiante VALUES ('21323013', 21323013, 'v', 'Breyer', 'Jose', 'Rojas', 'Moreno', '02124941680', '04242557648', 'Avenida El Cuartel Vereda 8 Casa N° 12. Catia Caracas', 'Estudiante', 'Estudiante', '1992-03-20', 'c621eb3d49');
INSERT INTO estudiante VALUES ('21326882', 21326882, 'v', 'Sofia', 'Marina', 'narvaez', 'garcia', '02126934873', '04165968719', 'calle apure, res murachi, apt 5-a, urb.valle abajo, caracas', 'ectetera groups ca', 'actriz de doblaje', '1993-10-27', '4fbb159374');
INSERT INTO estudiante VALUES ('21374356', 21374356, 'v', 'sebastian', 'marcelo', 'fuente', 'loero', '04125425564', '02128300223', 'las lomas bajas baruta', 'comercio', 'ayudante', '1994-05-13', '41641d6739');
INSERT INTO estudiante VALUES ('21374791', 21374791, 'v', 'Yohana', 'Scarlet', 'Galindez', 'Bermudez', '02123126973', '04165342982', 'El Valle, Av Intercomunal,Casa N{umero 50', 'No trabaja', 'No trabaja', '1993-03-09', '0d7a308da4');
INSERT INTO estudiante VALUES ('21389798', 21389798, 'v', 'Angel', 'Rafael', 'Aguiar', 'Solorzano', '02392466343', '04167104242', 'Charallave, Manzana 84. Edif. 1 piso 1-c', 'Estudiante', 'Estudiante', '1993-05-13', '8917ac591c');
INSERT INTO estudiante VALUES ('21405827', 21405827, 'v', 'Alba', 'Rebeca', 'Cimmarusti', 'Zuárez', '04263551243', '00000000000', 'Los Chaguaramos. Av. Las Ciencias.', 'No trabajo', 'No trabajo', '1992-10-18', '69f6d6d03b');
INSERT INTO estudiante VALUES ('21409304', 21409304, 'v', 'Leidy', 'Anyelina', 'Ruiz', 'Depablos', '04164057679', '02395111375', 'Valles del Tuy Urbanización Cartanal Sector 3 Calle 5 Casa 26. Estado Miranda', 'no', 'no', '1991-09-04', '3e02412f43');
INSERT INTO estudiante VALUES ('21409561', 21409561, 'v', 'sara', 'gossweiler', 'moreno', 'gossweiler', '02392229881', '04169347486', 'san frnacisco de yare, calle bolivar, cas 39. municipio simon rodriguez edo. miranda', 'unearte', 'estudiante', '1993-12-17', '9375197227');
INSERT INTO estudiante VALUES ('21413609', 21413609, 'v', 'Mariana', 'Angelina', 'Longar', 'Torres', '04124174280', '02126246833', 'Urbanizacion valle arriba, conjunto residencia rojas 6-3b, guatire', 'Estudiante', 'Estudiante', '1991-08-29', '15ad8ccea3');
INSERT INTO estudiante VALUES ('21424245', 21424245, 'v', 'africa', 'suali', 'blanco', 'ramos', '04265364308', '04265364308', 'res.justo briceño otalora n 37 segunda etapa. fuerte tiuna', 'instituto de cocina', 'estudiante', '1992-06-21', '7213f6e62f');
INSERT INTO estudiante VALUES ('21615196', 21615196, 'v', 'ender', 'ernesto', 'mora', 'delgado', '02129422331', '04141294224', 'minas de baruta', 'no', 'no', '1992-03-16', 'e957af2847');
INSERT INTO estudiante VALUES ('21618138', 21618138, 'v', 'dulce', 'laura', 'castillo', 'vega', '02124850405', '04241279780', 'el paraiso', 'estudiante', 'estudiante', '1993-07-19', 'ecf26e1a42');
INSERT INTO estudiante VALUES ('21623620', 21623620, 'v', 'Stefany', 'Corina', 'Peña', 'Hidalgo', '02126721529', '04120272418', 'Sector los Cardones Calle San Andres. Casa N° 63 El Valle.', 'Paseo las Mercedes', 'Estacionamiento del Centro Comercial', '1992-06-05', '48772b639e');
INSERT INTO estudiante VALUES ('21706953', 21706953, 'v', 'Benadit', 'Nadeleyn', 'Toledo', 'Betancourt', '02128723060', '04263102601', 'Quinta Avenida Elñ Amparo. Sector la Granja N° 21-12. Via El Junquito. Catia.', 'Estudiante', 'Estudiante', '1993-09-03', '2430efd065');
INSERT INTO estudiante VALUES ('21706956', 21706956, 'v', 'dilia', 'rosa', 'herrera', 'herrera', '04149182661', '02126258097', 'la pastora los mecedores calle real casa 52 ', 'provincial banco', 'administrativo multifuncional', '1989-10-30', 'a84bf84716');
INSERT INTO estudiante VALUES ('21724030', 21724030, 'v', 'daylis', 'nohemi', 'yepez', 'lozada', '02124718896', '00000000000', 'parroquia el carmen callejon triunfo obrero la vega caracas', 'ucv', 'Estudiante', '1994-08-13', '3bbe131f45');
INSERT INTO estudiante VALUES ('22015125', 22015125, 'v', 'ingrid', 'carolina', 'zamora', 'dugarte', '02123242799', '04263183723', 'altagracia a cuartel viejo', 'estudiante', 'estudiante', '1991-10-11', 'e98c272df3');
INSERT INTO estudiante VALUES ('22015128', 22015128, 'v', 'Zorayet', 'Del valle', 'Zamora', 'Dugarte', '02123242799', '04241071125', 'ALTAGRACIA A CUARTEL VIEJO, EDIF. ALTAGRACIA. PISO 5 APTO 29', 'Estudiante', 'Estudiante', '1994-01-14', 'd7ffe04795');
INSERT INTO estudiante VALUES ('22020098', 22020098, 'v', 'Jesus', 'Abraham', 'Hernandez', 'Briceño', '04266344117', '02128168066', 'Avenida San Martín El Guarataro Casa 7 Parroquia San Juan  ', 'no', 'no', '1993-06-04', '706032ad11');
INSERT INTO estudiante VALUES ('22020334', 22020334, 'v', 'grescger', 'nazarelis', 'pestano', 'diaz', '04122971800', '02125836959', 'el guarataro, calle nuevo mundo sector el obispo casa 44 - 4', 'bosen', 'operadora', '1992-10-27', 'e1d82a10cb');
INSERT INTO estudiante VALUES ('22035020', 22035020, 'v', 'jomasery ainisis', 'aenas', 'flores', 'ainisis', '04242249235', '11111111111', 'av gusman blanco casa 20', 'estudia', 'Estudiante', '1994-07-24', '6a7c4004ad');
INSERT INTO estudiante VALUES ('22035431', 22035431, 'v', 'nailyn', 'carolina', 'infante', 'gonzalez', '04143342569', '04143342569', 'av. ppal el cementerio calle sana eduviges', 'no trabaja', 'no posee', '1994-01-18', 'ee89170372');
INSERT INTO estudiante VALUES ('22048561', 22048561, 'v', 'Samanta', 'Del Valle', 'ortega', 'patiño', '02123282375', '04143013743', 'Calle 23 de enero, los teques, casa 27-1', 'Estudiante', 'Estudiante', '1995-05-08', '79ca9c3244');
INSERT INTO estudiante VALUES ('22048767', 22048767, 'v', 'Everlyn', 'Andrea', 'Mejias', 'Mendez', '02123233774', '04242194632', 'Los Teques. El Vigia, Guaicaipuro.', 'Estudiante', 'Estudiante', '1993-06-09', 'e0e3dd89e7');
INSERT INTO estudiante VALUES ('22330865', 22330865, 'v', 'Rubia', 'Esperanza', 'Vazquez', 'Castillo', '02126723658', '04145110677', 'Los jardines del valle, calle 8, residencias unep.', 'Estudiante', 'Estudiante', '1994-08-24', 'defa791173');
INSERT INTO estudiante VALUES ('22359190', 22359190, 'v', 'Graciela', 'Anabel', 'Clemente', 'Sojo', '02124283042', '04263205519', 'Baruta ojo de agua sector los mangos casa 76 caracas', 'Estudiante', 'Estudiante', '1994-04-07', '7b988a2384');
INSERT INTO estudiante VALUES ('24271884', 24271884, 'v', 'Alexandra', 'Yineth', 'Montilla', 'Fernandes', '02126153287', '04141363869', 'Buenaventura town house, castillejo, guatire', 'Fundamusical Simon Bolivar', 'Profesora de contrabajo', '1995-06-15', '3b701b0c98');
INSERT INTO estudiante VALUES ('22438056', 22438056, 'v', 'Jorfrancis', 'Carolina', 'Sanabria', 'Mendoza', '02126133499', '04241912969', 'Barrio D Bellard, Sector Valle Verde, Calle Sta Cruz, Casa n{umero 17, Guatire, Edo Miranda', 'No trabaja', 'No trabaja', '1994-07-07', '41cd739cda');
INSERT INTO estudiante VALUES ('22493565', 22493565, 'v', 'Carlos', 'Daniel', 'Ruiz', 'Pérez', '04128263938', '02123349130', 'Casa Rubimar. Calle Piedra Azul. Sector Villa Del Este. Guaicoco Paloverde.', 'No trabajo', 'No trabajo', '1993-12-21', 'f08bd5c145');
INSERT INTO estudiante VALUES ('22493587', 22493587, 'v', 'Ingrid', 'Johana', 'Avila', 'Borrero', '02124511067', '04163122060', 'Avenida Jose Angel Lamas, N° 33, Sector San Martin.Caracas', 'Hoyada', 'Vendedore', '1994-01-05', 'fd718b398a');
INSERT INTO estudiante VALUES ('22558172', 22558172, 'v', 'Angela', 'Maria', 'Villareal', 'Garcia', '02129116071', '04266088239', 'Guatire, Estado Miranda, Calle Galindez, sector el Pueblo casa c-31', 'no trabaja', 'no posee', '1994-07-18', '6dc3e818a3');
INSERT INTO estudiante VALUES ('22567175', 22567175, 'v', 'Naida', 'Johanna', 'Huertas', 'Trigoso', '02392121541', '04123987367', 'Valles del Tuy Cua 2 Residencias el Progreso, piso 1 Apto 1-d. Calle San Rafael', 'UEN Ezequiel Zamora', 'Docente', '1983-09-23', 'e94f4eb6e4');
INSERT INTO estudiante VALUES ('22611049', 22611049, 'v', 'joselin', 'marly', 'utrera', 'avila', '04266446708', '00000000000', 'urb guaicoco municipio sucre calle hacienda el negron', 'ucv', 'estuidante', '1994-02-18', 'e0ee34fe19');
INSERT INTO estudiante VALUES ('22618251', 22618251, 'v', 'daniela', 'alejandra', 'Rodriguez', 'carrascal', '04269046567', '00000000000', 'av las ciencias con calle humbolt edif arza III piso 3 los chaguaramos ', 'no trabaja', 'no trasbaja', '1993-08-06', '7cb8f47f8c');
INSERT INTO estudiante VALUES ('22671765', 22671765, 'v', 'daniela', 'patricia', 'aquino', 'montilla', '02126727596', '04267344907', 'el valle', 'no', 'no', '1993-02-17', '38a32a45c1');
INSERT INTO estudiante VALUES ('22690149', 22690149, 'v', 'Rosali', 'Rosali', 'Mendoza', 'Alvarado', '02393656981', '04129175343', 'Urb. nuestra señora de lourdes, sector quebrada seca, mnicipio simon bolivar, edo miranda', 'Unexpo', 'Estudiante', '1993-03-21', '2a431ca39b');
INSERT INTO estudiante VALUES ('22796426', 22796426, 'v', 'Betzaida', 'Nohemi', 'Ilarraza', 'Angarita', '02127163328', '04123654105', 'Avda Tamanaco res tamanaco el llanito petare miranda', 'club de video', 'Ventas', '1994-08-27', '679f68c520');
INSERT INTO estudiante VALUES ('22906943', 22906943, 'v', 'Adalberto', 'Jose', 'Mendez', 'Cabrera', '02124714737', '04129297597', 'Antimano Barrio el Carmen Sector Las Barras', 'no', 'no', '1993-02-28', 'b2bd015c3a');
INSERT INTO estudiante VALUES ('22908892', 22908892, 'v', 'winnifer', 'vanessa', 'orduz', 'mello', '02124610928', '04242233214', 'san martin', 'estudiante', 'estudiante', '1994-10-23', '4f20dad4f5');
INSERT INTO estudiante VALUES ('22974836', 22974836, 'v', 'Emmanuel', 'David Ali', 'Villalba', 'Zujur', '04128351987', '04128351987', 'Valles del Tuy- Cua. San Antonio Calle principal. Casa ° 50', 'Estudiante', 'Estudiante', '1992-07-21', 'd4f06cf1f3');
INSERT INTO estudiante VALUES ('23185323', 23185323, 'v', 'Keyis', 'Judith', 'Sarabia', 'Villasañez', '04169350735', '02129792880', 'Miranda. Baruta. Prados del Este. La Ciudadela.', 'Universidad Católica', 'Estudiante', '1993-06-21', 'c7eedcf388');
INSERT INTO estudiante VALUES ('23194364', 23194364, 'v', 'nohely', 'alejandra', 'luna', 'bracamonte', '02123651296', '04168149275', 'guarenas', 'cc buenaventura', 'vendedora', '1994-10-14', 'cc2ce54c56');
INSERT INTO estudiante VALUES ('23196102', 23196102, 'v', 'Aleimar', 'Janmari', 'Martinez', 'Castillo', '02123629332', '04123616324', 'Guarenas', 'Mac Donald', 'cajero', '1994-05-20', 'd68e572c4e');
INSERT INTO estudiante VALUES ('23425475', 23425475, 'v', 'Mileydi', 'Carolina', 'Traviezo', 'Moreno', '04164405030', '04125948894', 'Baruta,Sector El Hatillo', 'No trabaja', 'No trabaja', '1994-05-16', 'd1c4acfb21');
INSERT INTO estudiante VALUES ('23529324', 23529324, 'v', 'Eucaris', 'Daniela', 'Benitez', 'Serrano', '02128614940', '04140327082', 'La pastora, sector los mecedores, res. mecedorers, piso8, apto 53', 'Escuela de hacienda', 'estudiante', '1994-03-16', 'c72c827c13');
INSERT INTO estudiante VALUES ('23574166', 23574166, 'v', 'Leoberllyys', 'Amanda', 'Atilano', 'Linarez', '04264571565', '04121675247', 'Av. Intercomunal del Valle, Edif Urdaneta, Bloque 2-b, piso 3', 'No trabaja', 'No trabaja', '1992-11-30', '8ef4748043');
INSERT INTO estudiante VALUES ('23610554', 23610554, 'v', 'alexander', 'no', 'alvarez', 'vasquez', '02122418982', '04129895790', 'la urbina', 'estudiante', 'estudiante', '1995-12-20', '8244aa860e');
INSERT INTO estudiante VALUES ('23611674', 23611674, 'v', 'Neiro', 'Rafael', 'Vilchez', 'da Silva', '04241616017', '02123618379', 'Guarenas. Edo. Miranda. Municipio Plaza.', 'Universidad Antonio José de Sucre', 'Estudiante', '1994-04-13', '8d0ea53684');
INSERT INTO estudiante VALUES ('23613778', 23613778, 'v', 'Maria', 'Alejandra', 'Villarreal', 'Delgado', '02123470859', '04242291047', 'Edo Miranda. Municipio Zamora. Parroquia Guatire. Conjunto Castillejo. res Altos II Edif 13 Apto 13.34', 'Estudiante', 'Estudiante', '1995-08-06', '0463f0bca7');
INSERT INTO estudiante VALUES ('23615626', 23615626, 'v', 'andrea', 'sarahi', 'colmenares', 'alvarado', '02399950335', '04164281141', 'av solano con av las acacias frente a la previsora', 'estudiante', 'estudiante', '1993-11-18', '993485b268');
INSERT INTO estudiante VALUES ('23616375', 23616375, 'v', 'Daymar', 'De Jesus', 'Carpio', 'Cuevas', '02123280364', '04263140972', 'Urbanización Alto Verde Etapa 3 Edificio 2 Piso 4 Apto 4-D', 'no', 'no', '1995-04-20', '6500688b19');
INSERT INTO estudiante VALUES ('23642804', 23642804, 'v', 'osmary', 'nayetsi', 'delgado', 'linares', '02126412918', '04263184018', 'caricuao', 'empresa privada', 'secretaria', '1994-05-08', '1ab6c6d4ba');
INSERT INTO estudiante VALUES ('23652827', 23652827, 'v', 'Reina', 'Jose', 'Aguilera', 'Pagua', '02126816519', '04169338855', 'Av.Miguel Otero Silva,Coche, Cochecito, Bloque 4, Edif Renacer, piso 16, apt 08', 'No trabaja', 'No trabaja', '1992-08-24', '59f65587bc');
INSERT INTO estudiante VALUES ('23682791', 23682791, 'v', 'solbey', 'dhamaris', 'bohada', 'acosta', '04165193098', '11111111111', 'esquina de salas edificio Luisa', 'ucv', 'Estudiante', '1995-02-26', 'ee24d71330');
INSERT INTO estudiante VALUES ('23690132', 23690132, 'v', 'Arianna', 'Oygres', 'Urrieta', 'Morales', '02124147498', '04168245685', 'Los jardines del valle calle 17', 'Estudiante', 'Estudiante', '1995-05-14', '9eaffc5950');
INSERT INTO estudiante VALUES ('23690261', 23690261, 'v', 'georgelys', 'magdalena', 'lopez', 'garcia', '02126149075', '04266119909', 'el valle calle 19 de abril sector nube azul el valle', 'mac donald', 'cruew', '1992-12-07', 'b6fb35ea3b');
INSERT INTO estudiante VALUES ('23691255', 23691255, 'v', 'Gabriel', 'Antonio', 'Piñero', 'Mendez', '02124354404', '04262120848', 'Guarenas', 'estudiante', 'estudiante', '1995-10-10', 'f0d2c5cb74');
INSERT INTO estudiante VALUES ('23692671', 23692671, 'v', 'daniel', 'alberto', 'benitez', 'navas', '04241758877', '02128608437', 'av sucre residencia tinajita piso 6 app 6 c', 'unidos cines', 'personal de apoyo', '1993-11-19', '0c0614738b');
INSERT INTO estudiante VALUES ('23693302', 23693302, 'v', 'Alexandra', 'Alexandra', 'Obando', 'Gonzalez', '04241230123', '04140181898', 'Avenida los proceres con marques del toro, quinta hare- krishna', 'Indeoendiente', 'Independiente', '1971-03-03', '17040b3656');
INSERT INTO estudiante VALUES ('23695632', 23695632, 'v', 'anabel', 'oriana', 'alfonzo', 'montenegro', '04162087458', '04168272649', 'parroquia sucre propatria', 'no trabaja', 'no trabaja', '1992-10-01', 'fa44461506');
INSERT INTO estudiante VALUES ('23707350', 23707350, 'v', 'Andres', 'eduardo', 'brando', 'osorio', '02124624309', '04169101129', 'Av. San Martin, ESq Palo Grande, Sonia, Torre 1, piso 13, apt 134', 'No trabaja', 'No trabaja', '1993-02-09', '02e62551a2');
INSERT INTO estudiante VALUES ('23802965', 23802965, 'v', 'Oswaldo', 'David', 'Foucault', 'Pinto', '04127204091', '04127204091', 'Edo miranda, municipio sucre, la california sucre sur, edif marana, piso 1, 12', 'Ucv', 'Estudiante', '1994-04-04', '6d7b2f5347');
INSERT INTO estudiante VALUES ('23806810', 23806810, 'v', 'anny', 'betzabeth', 'azuaje', 'zerpa', '02128305030', '04143728669', 'baruta, hoyo de la puerta calle el abrego', 'estudiante', 'estudiante', '1989-09-20', '7c742f80c8');
INSERT INTO estudiante VALUES ('23850172', 23850172, 'v', 'cristo', 'yair', 'colmenares', 'montoya', '04166058914', '00000000000', 'el valle res san pedro', 'no trabaja', 'no trabaja', '1995-11-23', 'a6ad506249');
INSERT INTO estudiante VALUES ('23918853', 23918853, 'v', 'Wilmer', 'Antonio', 'Cordero', 'Sira', '04269534119', '04268554443', 'Av. Intercomunal El Valle. Sector Ezequiel Zamora. Casa n. 10.', 'No trabajo', 'No trabajo', '1994-03-09', '6287cf39c7');
INSERT INTO estudiante VALUES ('23943152', 23943152, 'v', 'ligia', 'neryanna', 'gonzalez', 'michelena', '02122341260', '04141072970', 'avenida b casaligia la carlota', 'estudia', 'estudiante', '1992-07-16', '90ddb525fa');
INSERT INTO estudiante VALUES ('24210448', 24210448, 'v', 'ricardo', 'isaac', 'zambrano', 'andrade', '04122963874', '00000000000', 'av. intercomunal el valle calle 2 vista alegre n 6', 'no trabajo', 'no posee', '1994-06-08', '4fb51c9c34');
INSERT INTO estudiante VALUES ('24222864', 24222864, 'v', 'Adalid', 'Jordana', 'Sanabria', 'Izaguirre', '04129563152', '04129563152', 'Avenida Baralt Esquina Bucare', 'no trabaja', 'no posee', '1996-03-29', 'f9189d1fa3');
INSERT INTO estudiante VALUES ('24234087', 24234087, 'v', 'Adriana', 'Alejandra', 'Ron', 'Mosqueda', '02128617592', '04144510419', 'La pastora', 'estudiante', 'estudiante', '1993-10-09', 'cdbc23d2f1');
INSERT INTO estudiante VALUES ('24277687', 24277687, 'v', 'anyely', 'aleuyineth', 'villadiego', 'no posee', '02128338847', '04264091362', 'petare barrio san blas', 'no', 'no', '1994-02-17', '7a58d48253');
INSERT INTO estudiante VALUES ('24277968', 24277968, 'v', 'jesael', 'Jose', 'juarez', 'luna', '02127377584', '04123523328', 'La CAmpiña, Res El pilar, piso 4, apt 9', 'No trabaja', 'No trabaja', '1995-05-11', 'e37fbc1e78');
INSERT INTO estudiante VALUES ('24309002', 24309002, 'v', 'Jocsan', 'Zorohabhet', 'Mendoza', 'Bello', '02126810272', '04123083961', 'Residencias hipodromo, coche, la rinconada', 'Estudiante', 'Estudiante', '1994-03-06', '7cd3fa1630');
INSERT INTO estudiante VALUES ('24313246', 24313246, 'v', 'Ivana', 'Carolina', 'Orduz', 'Mello', '04167231551', '02124610928', 'Av. Santander. Edif. Santander. San Martín.', 'No trabajo', 'No trabajo', '1996-04-20', 'bacca6feee');
INSERT INTO estudiante VALUES ('24335316', 24335316, 'v', 'Kermelin', 'Dayeysis', 'Solórzano', 'Fuentes', '04126358186', '02126931375', 'Calle Sanoja Quinta Silvia N. 6. Los Chaguaramos. Caracas - Miranda.', 'Los Chaguaramos', 'Mesonera', '1993-07-26', 'a5f91574bd');
INSERT INTO estudiante VALUES ('24408861', 24408861, 'v', 'antonio', 'javier', 'bernacer', 'sierra', '02122846812', '04264078718', 'los palos grandes', 'no', 'no', '1995-05-25', 'c95e144e0a');
INSERT INTO estudiante VALUES ('24440415', 24440415, 'v', 'Maria', 'Alejandra', 'Santaella', 'Ruan', '02129423196', '04242464194', 'Colinas de la Tahona Conjunto Residencial Camino Real Torre A Apartamento 94. Baruta', 'no', 'no', '1994-03-03', '99b3a25c7a');
INSERT INTO estudiante VALUES ('24456052', 24456052, 'v', 'Maria', 'Consuelo', 'Borrero', 'Sanchez', '02124511067', '04169028735', 'Avenida San Martin, Calle Jose Angel Lamas. Casa 32. Caracas', 'Peluqueria Macborrero', 'Peluquera', '1963-07-20', 'b92bc4131f');
INSERT INTO estudiante VALUES ('24477883', 24477883, 'v', 'Kelvin', 'Rafael', 'Pinto', 'Perez', '02125512421', '04267154110', 'av.baralt edif. 13 de abril piso 8 apto 02 parroquia altagarcia municipio libertador', 'No trabajo', ' estudiante', '1994-10-22', '8cfb1ba48c');
INSERT INTO estudiante VALUES ('24636446', 24636446, 'v', 'Gabriela', 'Aurora', 'Araque', 'Angola', '04242608741', '02124331005', 'Dtto. Capital. Caracas. Caricuao. Ud - 5. Bloque 20. Piso 8. Apto 802. Escalera 1. ', 'No trabajo', 'No trabajo', '1994-02-13', '377b58352f');
INSERT INTO estudiante VALUES ('24655639', 24655639, 'v', 'Barbara', 'Mercedes', 'Suzzarini', 'Salazar', '02126810272', '04168105882', 'Km 12 de la panamericana, sector el carmen, residencias agualinda', 'Estudiante', 'Estudiante', '1995-10-25', 'a1f8d7b467');
INSERT INTO estudiante VALUES ('24740073', 24740073, 'v', 'Rafael', 'Angel', 'Vasquez', 'Gomez', '04248553362', '02128809802', 'Urb. Chaguaramos. Edif. Las Cumbres. Piso 8. Apto. 8-A.', 'No trabajo', 'No trabajo', '1995-07-23', '1498f362b3');
INSERT INTO estudiante VALUES ('24749047', 24749047, 'v', 'barbara', 'jose', 'rincones', 'mendoza', '04127077943', '02123452769', 'kenedy terraza b frente al bloque 3 casa 26', 'no posee', 'no posee', '1995-11-01', 'b37ddee0ff');
INSERT INTO estudiante VALUES ('24758212', 24758212, 'v', 'Crhistian', 'David', 'Contreras', 'Villarreal', '02128602665', '04122667791', 'la pastora las dos pilitas a portillo', 'Estudiante', 'Estudiante', '1996-07-20', '832b7fd7f8');
INSERT INTO estudiante VALUES ('24758315', 24758315, 'v', 'maria', 'alejandra', 'ramirez', 'viva', '04268135273', '02123398205', 'catia av circumbalacion lomas de urdaneta ', 'no posee', 'no posee', '1994-06-24', 'e56b374a99');
INSERT INTO estudiante VALUES ('24758965', 24758965, 'v', 'anyoely', 'margarita', 'villegas', 'del toro', '04142613272', '04167080644', 'petare jose felix rivas calle transformador', 'no trabaja', 'no trabaja', '1995-08-20', 'dadfac026f');
INSERT INTO estudiante VALUES ('24883532', 24883532, 'v', 'Kimberly', 'Sinai', 'Mendoza', 'Alvarez', '02126317803', '04129803995', 'Prolongacion Zuloaga, Calle Luis Razetti, Casa n. 50, Los Rosales', 'Universidad Central de Venezuela', 'Estudiante', '1995-01-25', '6532f9bee0');
INSERT INTO estudiante VALUES ('24939913', 24939913, 'v', 'samuel', 'leonardo', 'malave', 'hernandez', '04263888789', '02126939173', 'caracas el valle edif san antonio', 'no trabaja', 'no trabaja', '1995-04-11', 'b344d523bc');
INSERT INTO estudiante VALUES ('24940048', 24940048, 'v', 'jean', 'carlos', 'quijada', 'frias', '04244127081', '04241217081', 'terrazas de la vega', 'estudiante', 'estudiante', '1993-09-25', 'a8f6c51af8');
INSERT INTO estudiante VALUES ('24981765', 24981765, 'v', 'rosbarith', 'de los angeles', 'marquez', 'morales', '04168409934', '04242435397', 'el valle', 'estudiante', 'estudiante', '1994-09-13', 'd8085912fc');
INSERT INTO estudiante VALUES ('25011390', 25011390, 'v', 'genesis', 'nazareth', 'torres', 'martinez', '02128629525', '04267145813', 'la pastora', 'estudiante', 'estudiante', '1996-06-05', '0d72cf6a63');
INSERT INTO estudiante VALUES ('25019347', 25019347, 'v', 'Isaac', 'Rafael', 'Díaz', 'Rojas', '04242702473', '02128588827', 'Bloq. 35. Urb. 23 de Enero. Apt. 19. Planta Baja. Catia. Caracas', 'Plaza Venezuela', 'Florista', '1993-12-21', 'd7b9688721');
INSERT INTO estudiante VALUES ('25136343', 25136343, 'v', 'frank', 'junior', 'solano', 'quintero', '02128781872', '04164112182', 'gramoven catia', 'no', 'no', '2005-11-27', 'baa25f1b12');
INSERT INTO estudiante VALUES ('25211287', 25211287, 'v', 'Gustavo', 'Adolfo', 'Tirado', 'Jimenez', '02124842373', '04129950601', 'Av Baralt bucare a pilita res bucare torre b apto 45 sta rosalia caracas  ', 'Estudiante', 'Estudiante', '1996-02-05', '63e80728f6');
INSERT INTO estudiante VALUES ('25213661', 25213661, 'v', 'jose', 'antonio', 'canino', 'ruiz', '02123112475', '04263556390', 'av. lecuna edf.la rambla piso 8 apto 48, santa rosalia', 'tetrminal nuevo circo', 'encargado', '1996-02-16', '51750860da');
INSERT INTO estudiante VALUES ('25229695', 25229695, 'v', 'Heylin', 'Gabriela', 'Marcano', 'Sanchez', '02392252049', '04242111796', 'Ocumare del Tuy, Res. del Rodeo, torre A, piso 6, apto 63,', 'Estudiante', 'Estudiante', '1995-06-11', '7dc79524c6');
INSERT INTO estudiante VALUES ('25252208', 25252208, 'v', 'Yessika', 'Yamileth', 'Suriel', 'Mercedes', '02128702034', '04141375757', 'Los Magallanes de Catia. Calle el lago. Urbanizacion Guaicaipuro I', 'Estudiante', 'Asistente Administrativo', '1995-01-04', '3263a208ba');
INSERT INTO estudiante VALUES ('25367842', 25367842, 'v', 'Emily', 'Madelaine', 'Salazar', 'Sifontes', '02124617980', '04162106981', 'San Martin, calle el martillo, casa 9-1', 'Estudiante', 'Estudiante', '1996-12-14', 'b18e896166');
INSERT INTO estudiante VALUES ('25386830', 25386830, 'v', 'Eliana', 'Daniela', 'Reinoso', 'Romero', '02123221948', '04269087545', 'Sector La Gonzalera. La lagunetica. Urb asocsuveas calle 2 casa 96 los teques. municvipio guaicaipuro.', ' No trabaja', ' No trabaja', '1996-05-03', '900a8efa62');
INSERT INTO estudiante VALUES ('25689120', 25689120, 'v', 'Gledmar', 'Katiuska', 'Vegas', 'Solano', '04241834257', '02392467341', 'Quebrada de Cua Mirador el Bosque Calle Las Trinitarias Casa 26 ', 'no', 'no', '1997-01-05', 'f05f3f43c1');
INSERT INTO estudiante VALUES ('25716256', 25716256, 'v', 'jesus', 'nicolas', 'felizzola', 'da silva', '02126316601', '04143691885', 'av. luisa caceres de arismendi casa nro 10 los rosales', 'el panteon', 'operador de master', '1991-01-26', 'db06dda0c4');
INSERT INTO estudiante VALUES ('25735809', 25735809, 'v', 'joselin', ' del carmen', 'rodriguez', ' santander', '02123626834', '04242191909', 'edif. j2 piso 2 apto 7 sector cloris guarenas. edo. miranda', 'no trabaja', 'no estudia', '1996-02-08', '7ba16cbc40');
INSERT INTO estudiante VALUES ('25773523', 25773523, 'v', 'María', 'del Carmen', 'Zambrano', 'Valera', '04165502741', '02125783561', 'La Candelaria. Av. Andrés Bello. Calle Principal de Sarria. Edif. Aribia.', 'No trabajo', 'No trabajo', '1990-08-13', 'd5f7390011');
INSERT INTO estudiante VALUES ('25845674', 25845674, 'v', 'emmalie', 'beatriz', 'diaz', 'rodriguez', '04164536813', '04160128005', 'guarenas', 'estudiante', 'estudiante', '1996-03-05', 'c88eb69356');
INSERT INTO estudiante VALUES ('25867438', 25867438, 'v', 'gabriela', 'vanesa', 'alvarez', 'pirela', '02126939608', '04164045171', 'los rosales', 'estudiante', 'estudiante', '1995-08-24', '2c55efc87e');
INSERT INTO estudiante VALUES ('26414525', 26414525, 'v', 'Francisco', 'Arley', 'Molina', 'sin segundo', '04267610451', '02126063340', 'Av. Intercomunal, sector san andres, casa n| 23', 'ubv', 'analista', '1965-08-17', '03e9e3a077');
INSERT INTO estudiante VALUES ('26483144', 26483144, 'v', 'Nestor', 'Jose', 'Joussef', 'Ortega', '02127304842', '04263627242', 'Calle Negrín, callejón Mafalda Maldonado, edif. Sildith, piso 1, La Florida, Parroquia El Recreo', 'Bachiller', 'Bachiller', '1997-06-06', '299c9248e5');
INSERT INTO estudiante VALUES ('27496133', 27496133, 'v', 'Vladimir', 'Antonio', 'Ramirez', 'Yuncosa', '02126364302', '04129887960', 'El Calvario CopaCabana, parte alta calle la cruz, casa n|02 Guarenas Edo. Miranda', 'cencozztti', 'seguridad', '1984-04-19', '3c223cc0fb');
INSERT INTO estudiante VALUES ('28141100', 28141100, 'v', 'Leyner', 'no', 'Montes', 'Marsiglia', '04142509263', '04142921432', 'José Félix Rivas Zona 10 Escalera 5 Casa Virgen Del Valle Petare', 'Independiente', 'Carpinteria', '1993-08-30', '7e045721c3');
INSERT INTO estudiante VALUES ('62031233', 62031233, 'v', 'Martha', 'Aleida', 'Antias', 'Gonzalez', '04129192107', '02123934570', 'Autopista Regional de Centro KIlometro 14 Calle 4 Sector Los Manantiales Calle 4-10', 'comerciante', 'Comerciante', '1966-02-23', '72fc1073a0');
INSERT INTO estudiante VALUES ('63212336', 63212336, 'v', 'Yuribay', 'Josefina', 'Alberti', 'Marcano', '04142001013', '02126063067', 'Valles del Tuy', 'Ubv', 'Jefe de tic', '1969-04-07', '6b397e1a28');
INSERT INTO estudiante VALUES ('81072197', 81072197, 'e', 'Pastora', 'Andina', 'Jordan', 'Jordan', '04168034353', '04168034353', 'San Bernardino, calle 26, Cristobal Rojas', 'no trabaja', 'no posee', '1947-05-19', 'c22a9c0cd0');
INSERT INTO estudiante VALUES ('82154134', 82154134, 'e', 'jesus', 'david', 'damian', 'rosado', '04160138653', '02124931429', 'esquina tablitas a sordo, parroquia santa rosalia, caracas, casa 28-1', 'particular', 'particular', '1984-01-05', '6daf995fde');
INSERT INTO estudiante VALUES ('82211217', 82211217, 'e', 'Adriana', 'Alieth', 'Michael', 'Ramirez', '02127632354', '04248395701', 'Boulevard de Sabana Grande. Edif Ben Piso 7 Apto 71. El Recreo. Caracas.', 'Sabana Grande', 'Tecnico dental', '1983-10-03', 'ae138a6319');
INSERT INTO estudiante VALUES ('82296765', 82296765, 'e', 'maria', 'chiara', 'gaudioso', 'gaudioso', '04123752905', '04120983070', 'Av Principal 5 de julio , 1er plan La Silsa', 'Independiente', 'profesora', '1988-06-28', 'a152452093');
INSERT INTO estudiante VALUES ('84416011', 84416011, 'e', 'Luis', 'Alfredo', 'Olivas', 'Portocarrero', '04242520044', '04242520044', 'Calle las Luces numero 39, Parroquia Santa Rosalia, Caracas', 'no trabaja', 'no posee', '1987-06-16', 'f436f5e3c4');
INSERT INTO estudiante VALUES ('84416248', 84416248, 'e', 'Alix', 'Ximena', 'Rico', 'Hurtado', '02125159487', '04129045486', 'Avenida San Gabriel. Quinta Los Arbolitos Casa 69. Urbanizacion Alta Florida. Caracas', 'Estudiante', 'Estudiante', '1985-02-17', 'efc6d189b3');
INSERT INTO estudiante VALUES ('84481156', 84481156, 'e', 'ferney', 'camilo', 'palacio', 'rojas', '04129605880', '00000000000', 'la trinidad calle la cantera casa 106', 'fundamusical', 'musico', '1988-03-12', '1a50cf2273');
INSERT INTO estudiante VALUES ('84487034', 84487034, 'e', 'Miguel', 'Angel', 'Avendaño', 'Cespedes', '04267157757', '04267052771', 'Calle la cantera, casa 106, 47-17', 'Fundamusical Simon Bolivar', 'Instructor', '1984-03-01', '3c8c644b1b');
INSERT INTO estudiante VALUES ('84575421', 84575421, 'e', 'Betsy', 'Giovanna', 'Saldaña', 'Montoya', '04141616497', '04141616497', 'La Candelaria. Esquina Chimbarazo con Tiñidero', 'No trabaja', 'No trabaja', '1988-11-05', '8e02f77a59');
INSERT INTO estudiante VALUES ('18029158', 18029158, 'v', 'rosana', 'no', 'sanchez', 'robleda', '02125712994', '04167055959', 'la candelaria', 'estudiante', 'estudiante', '1987-12-10', '3190547442');


--
-- Data for Name: horario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO horario VALUES (1, 'ing04d', 'miercoles', 'matutino', '07:30:00', '09:00:00', '8"A"');
INSERT INTO horario VALUES (2, 'ing04d', 'viernes', 'matutino', '07:30:00', '09:00:00', '8"B"');
INSERT INTO horario VALUES (3, 'port01d', 'lunes', 'matutino', '10:30:00', '12:00:00', '5"I"');
INSERT INTO horario VALUES (4, 'ing02t', 'lunes', 'vespertino', '04:00:00', '05:30:00', '6"K"');
INSERT INTO horario VALUES (5, 'ing02t', 'miercoles', 'vespertino', '04:00:00', '05:30:00', '6"K"');
INSERT INTO horario VALUES (6, 'port01d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '5"I"');
INSERT INTO horario VALUES (7, 'port02d', 'lunes', 'matutino', '10:30:00', '12:00:00', '5"J"');
INSERT INTO horario VALUES (8, 'port02d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '6"L"');
INSERT INTO horario VALUES (9, 'port03n', 'martes', 'nocturno', '06:00:00', '07:30:00', '8"A"');
INSERT INTO horario VALUES (10, 'port03n', 'jueves', 'nocturno', '06:00:00', '07:30:00', '8"A"');
INSERT INTO horario VALUES (11, 'alem01d', 'lunes', 'matutino', '10:30:00', '12:00:00', '6"Q"');
INSERT INTO horario VALUES (12, 'alem01d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '6"Q"');
INSERT INTO horario VALUES (13, 'fra01d', 'lunes', 'matutino', '10:30:00', '12:00:00', '6"N"');
INSERT INTO horario VALUES (14, 'fra01d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '6"N"');
INSERT INTO horario VALUES (17, 'fra02d', 'martes', 'matutino', '09:00:00', '10:30:00', '8"A"');
INSERT INTO horario VALUES (18, 'fra02d', 'jueves', 'matutino', '09:00:00', '10:30:00', '8"A"');
INSERT INTO horario VALUES (19, 'fra03d', 'lunes', 'matutino', '09:00:00', '10:30:00', '8"A"');
INSERT INTO horario VALUES (20, 'fra03d', 'miercoles', 'matutino', '09:00:00', '10:30:00', '8"A"');
INSERT INTO horario VALUES (21, 'fra01t', 'lunes', 'vespertino', '01:00:00', '02:30:00', '3"L"');
INSERT INTO horario VALUES (22, 'fra01t', 'miercoles', 'vespertino', '01:00:00', '02:30:00', '6"D"');
INSERT INTO horario VALUES (23, 'fra02t', 'martes', 'vespertino', '02:30:00', '04:00:00', '8"B"');
INSERT INTO horario VALUES (24, 'fra02t', 'viernes', 'vespertino', '02:30:00', '04:00:00', '8"B"');
INSERT INTO horario VALUES (25, 'chin01d', 'lunes', 'matutino', '10:30:00', '12:00:00', '3"W"');
INSERT INTO horario VALUES (26, 'chin01d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '4"B"');
INSERT INTO horario VALUES (27, 'arab01d', 'lunes', 'matutino', '10:30:00', '12:00:00', '4"D"');
INSERT INTO horario VALUES (28, 'arab01d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '4"D"');
INSERT INTO horario VALUES (29, 'arab01n', 'lunes', 'nocturno', '06:00:00', '07:30:00', '5"W"');
INSERT INTO horario VALUES (30, 'arab01n', 'miercoles', 'nocturno', '06:00:00', '07:30:00', '2"G"');
INSERT INTO horario VALUES (31, 'lsv01d', 'lunes', 'matutino', '10:30:00', '12:00:00', '5"G"');
INSERT INTO horario VALUES (32, 'lsv01d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '5"G"');
INSERT INTO horario VALUES (33, 'lsv02d', 'lunes', 'matutino', '10:30:00', '12:00:00', '5"H"');
INSERT INTO horario VALUES (35, 'lsv02d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '5"H"');
INSERT INTO horario VALUES (36, 'lsv01t', 'lunes', 'vespertino', '01:00:00', '02:30:00', '5"H"');
INSERT INTO horario VALUES (37, 'lsv01t', 'miercoles', 'vespertino', '01:00:00', '02:30:00', '6"S"');
INSERT INTO horario VALUES (38, 'lsv02t', 'miercoles', 'vespertino', '02:30:00', '04:00:00', '8"J"');
INSERT INTO horario VALUES (39, 'lsv02t', 'viernes', 'vespertino', '02:30:00', '04:00:00', '8"J"');
INSERT INTO horario VALUES (40, 'wayuu', 'lunes', 'nocturno', '06:00:00', '07:30:00', '5"I"');
INSERT INTO horario VALUES (41, 'wayuu', 'miercoles', 'nocturno', '06:00:00', '07:30:00', '2"F"');
INSERT INTO horario VALUES (42, 'rus01t', 'martes', 'vespertino', '01:00:00', '02:30:00', '8"A"');
INSERT INTO horario VALUES (43, 'rus01t', 'jueves', 'vespertino', '01:00:00', '02:30:00', '8"A"');
INSERT INTO horario VALUES (44, 'ing05d', 'lunes', 'matutino', '07:30:00', '09:00:00', '');
INSERT INTO horario VALUES (45, 'ing05d', 'miercoles', 'matutino', '07:30:00', '09:00:00', '');
INSERT INTO horario VALUES (46, 'ing06d', 'martes', 'matutino', '09:00:00', '10:30:00', 'B"B"');
INSERT INTO horario VALUES (47, 'ing06d', 'jueves', 'matutino', '09:00:00', '10:30:00', '8"B"');
INSERT INTO horario VALUES (48, 'fra04d', 'lunes', 'matutino', '07:30:00', '09:00:00', '8"A"');
INSERT INTO horario VALUES (49, 'fra04d', 'jueves', 'matutino', '07:30:00', '09:00:00', '8"A"');
INSERT INTO horario VALUES (50, 'ita01d', 'lunes', 'matutino', '10:30:00', '12:00:00', '4"K"');
INSERT INTO horario VALUES (51, 'ita01d', 'miercoles', 'matutino', '10:30:00', '12:00:00', '6"S"');
INSERT INTO horario VALUES (52, 'ita01t', 'lunes', 'vespertino', '01:00:00', '02:30:00', '8"B"');
INSERT INTO horario VALUES (53, 'ita01t', 'miercoles', 'vespertino', '01:00:00', '02:30:00', '8"B"');


--
-- Name: horario_cod_horario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('horario_cod_horario_seq', 5, true);


--
-- Data for Name: idioma; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO idioma VALUES ('alem', 'alemán', 4);
INSERT INTO idioma VALUES ('arab', 'arabe', 4);
INSERT INTO idioma VALUES ('chin', 'chino', 4);
INSERT INTO idioma VALUES ('fra', 'francés', 4);
INSERT INTO idioma VALUES ('ing', 'inglés', 4);
INSERT INTO idioma VALUES ('ita', 'italiano', 4);
INSERT INTO idioma VALUES ('kar', 'kariña', 4);
INSERT INTO idioma VALUES ('lsv', 'lsv', 4);
INSERT INTO idioma VALUES ('port', 'portugués', 4);
INSERT INTO idioma VALUES ('wayuu', 'wayuunaiki', 4);
INSERT INTO idioma VALUES ('rus', 'ruso', 4);


--
-- Data for Name: inscripcion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO inscripcion VALUES ('efb2b399fi', '2013-07-17', 'v', '19998199', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('00124e3d4i', '2013-07-17', 'v', '14534334', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('0019cbe36i', '2013-07-19', 'v', '10537691', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('01eadb236i', '2013-07-18', 'v', '20605915', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('00a948b12i', '2013-07-22', 'v', '19692840', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('02e62551ai', '2013-07-19', 'v', '23707350', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('03e9e3a07i', '2013-07-17', 'v', '26414525', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('0463f0bcai', '2013-07-18', 'v', '23613778', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('047f6d253i', '2013-07-18', 'v', '19868074', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('0583c634ci', '2013-07-19', 'v', '6453629', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('05e6c804bi', '2013-07-22', 'v', '4166620', NULL, '04:00:00', NULL, 'arab01d', 'a');
INSERT INTO inscripcion VALUES ('06415c0d9i', '2013-07-19', 'v', '12076432', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('074565f09i', '2013-07-19', 'v', '20489202', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('076926848i', '2013-07-17', 'v', '18388749', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('1f1d2e459i', '2013-07-19', 'v', '7952027', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('1f393a6d9i', '2013-07-19', 'v', '15098340', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('1fc31aae6i', '2013-07-19', 'v', '16890948', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('1fee5de0bi', '2013-07-19', 'v', '6127172', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('2181b6975i', '2013-07-18', 'v', '18445456', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('218729862i', '2013-07-17', 'v', '13864801', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('226a34e6bi', '2013-07-19', 's', '19518496', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('22a2ab206i', '2013-07-17', 'v', '20761303', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('23d0b85fai', '2013-07-18', 'v', '18042321', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('2430efd06i', '2013-07-18', 'v', '21706953', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('24d3cfe56i', '2013-07-18', 'v', '13832848', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('2539eaa2ei', '2013-07-18', 'v', '4815716', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('25ce30658i', '2013-07-19', 'v', '5565434', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('265b73bf7i', '2013-07-18', 'v', '16564590', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('280086844i', '2013-07-17', 'v', '19711843', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('299c9248ei', '2013-07-19', 'v', '26483144', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('29b04103ai', '2013-07-17', 'v', '19065524', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('2a431ca39i', '2013-07-19', 'v', '22690149', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('2ac99c249i', '2013-07-18', 'v', '6810890', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('2ad7bebf4i', '2013-07-17', 'v', '16659596', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('2b060bbc3i', '2013-07-17', 'v', '19015578', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('2c55efc87i', '2013-07-18', 'v', '25867438', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('2c992d9b8i', '2013-07-17', 's', '5904501', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('2ce9788eai', '2013-07-18', 'v', '6836369', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('2d045f86ci', '2013-07-17', 'v', '6399978', NULL, '04:00:00', NULL, 'wayuu', 'a');
INSERT INTO inscripcion VALUES ('2da45debei', '2013-07-19', 'v', '11986411', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('2f3817b5ei', '2013-07-18', 'v', '20605914', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('2f8439f0bi', '2013-07-18', 'v', '19717657', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('30d074b49i', '2013-07-17', 'v', '19087326', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('30db7669fi', '2013-07-18', 'v', '15856401', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('30f138400i', '2013-07-17', 'v', '6230855', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('319054744i', '2013-07-18', 'v', '18029158', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('32187cfc0i', '2013-07-17', 'v', '11559219', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('32308b11bi', '2013-07-17', 'v', '17823657', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('3263a208bi', '2013-07-18', 'v', '25252208', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('3290bf5cbi', '2013-07-18', 'v', '3714321', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('352083158i', '2013-07-19', 's', '13893485', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('35983234ei', '2013-07-17', 'v', '10542923', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('36c9314d1i', '2013-07-18', 'v', '15518458', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('377b58352i', '2013-07-18', 'v', '24636446', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('38a32a45ci', '2013-07-18', 'v', '22671765', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('38cd8416ei', '2013-07-18', 'v', '1277003', NULL, '04:00:00', NULL, 'port02d', 'a');
INSERT INTO inscripcion VALUES ('39d800e02i', '2013-07-19', 'v', '20676451', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('3a5ace480i', '2013-07-18', 'v', '6452323', NULL, '04:00:00', NULL, 'port02d', 'a');
INSERT INTO inscripcion VALUES ('3aeeb00a7i', '2013-07-18', 'v', '20490254', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('3af90f4aci', '2013-07-17', 'v', '19162428', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('3b1ffb755i', '2013-07-17', 'v', '2518991', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('3b701b0c9i', '2013-07-17', 'v', '24271884', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('3bbe131f4i', '2013-07-19', 'v', '21724030', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('3c223cc0fi', '2013-07-17', 'v', '27496133', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('3c4824761i', '2013-07-18', 'v', '10578660', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('3c8c644b1i', '2013-07-17', 's', '84487034', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('3cb5485b1i', '2013-07-18', 'v', '17576864', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('3cf22be9ei', '2013-07-17', 'v', '18932853', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('3d06ea9f3i', '2013-07-17', 'v', '4754490', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('3d22ffa16i', '2013-07-18', 'v', '19429046', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('3d96ad349i', '2013-07-17', 'v', '12639807', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('3e02412f4i', '2013-07-19', 'v', '21409304', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('3e5e19e85i', '2013-07-17', 'v', '20127441', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('3ed6eb404i', '2013-07-17', 'v', '12292310', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('3fd7b7b59i', '2013-07-18', 'v', '16871393', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('40c0cbd0di', '2013-07-18', 'v', '11990080', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('41641d673i', '2013-07-18', 'v', '21374356', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('41af4caf3i', '2013-07-17', 'v', '19371391', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('41cd739cdi', '2013-07-17', 'v', '22438056', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('42fd382bei', '2013-07-18', 'v', '18104664', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('4324865dbi', '2013-07-18', 'v', '19573491', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('434ca7913i', '2013-07-17', 'v', '17123389', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('43aae6ce8i', '2013-07-18', 'v', '19930990', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('43e0baefai', '2013-07-17', 'v', '19212586', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('44806f3f8i', '2013-07-17', 'v', '13231533', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('45d364c86i', '2013-07-17', 'v', '19208506', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('45d5d619fi', '2013-07-17', 'v', '17966102', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('471ed7d95i', '2013-07-17', 'v', '15327666', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('48772b639i', '2013-07-18', 'v', '21623620', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('48c045d54i', '2013-07-19', 'v', '14156292', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('4928d98c9i', '2013-07-22', 'v', '14411318', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('49f8402c1i', '2013-07-18', 's', '13614671', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('4aedfd92ei', '2013-07-18', 'v', '19614495', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('4af71ab81i', '2013-07-17', 'v', '19499135', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('4d64d7103i', '2013-07-17', 'v', '16663376', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('4dbd48789i', '2013-07-18', 'v', '21103279', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('4e3d0380ei', '2013-07-18', 'v', '17351287', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('4f20dad4fi', '2013-07-17', 'v', '22908892', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('4fb51c9c3i', '2013-07-19', 'v', '24210448', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('4fbb15937i', '2013-07-19', 'v', '21326882', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('50de41b33i', '2013-07-17', 'v', '16562562', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('50e04f804i', '2013-07-17', 'v', '6928842', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('51155427bi', '2013-07-17', 'v', '13749723', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('51750860di', '2013-07-18', 'v', '25213661', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('518d87db7i', '2013-07-22', 's', '13171743', NULL, '04:00:00', NULL, 'arab01d', 'a');
INSERT INTO inscripcion VALUES ('52b4143d2i', '2013-07-17', 'v', '17075089', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('53c25df46i', '2013-07-19', 'v', '16923540', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('5455dd71ci', '2013-07-17', 's', '20596697', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('54a39bed4i', '2013-07-17', 'v', '7566883', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('54c20b79ei', '2013-07-19', 'v', '16555999', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('55e933cc1i', '2013-07-17', 'v', '16970555', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('563c93d3ci', '2013-07-18', 'v', '5430120', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('595e40147i', '2013-07-17', 'v', '15614763', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('5981e6fe9i', '2013-07-17', 'v', '19852826', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('59f65587bi', '2013-07-17', 'v', '23652827', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('5ae6dc198i', '2013-07-18', 'v', '18745220', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('5ba11776bi', '2013-07-17', 'v', '12392964', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('5daea9bc6i', '2013-07-17', 'v', '20799233', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('5ec13af60i', '2013-07-18', 'v', '19199979', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('60f352f81i', '2013-07-19', 'v', '20870063', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('6287cf39ci', '2013-07-17', 'v', '23918853', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('62a28619ei', '2013-07-18', 'v', '17803163', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('6347ef37ci', '2013-07-19', 'v', '1743567', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('635e7aefdi', '2013-07-17', 'v', '3807699', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('63e80728fi', '2013-07-18', 'v', '25211287', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('644acabfei', '2013-07-18', 'v', '19820399', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('6500688b1i', '2013-07-19', 'v', '23616375', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('6513c0a74i', '2013-07-22', 'v', '19507237', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('6532f9beei', '2013-07-17', 'v', '24883532', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('65c970ff7i', '2013-07-18', 'v', '6563726', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('66d767af9i', '2013-07-17', 'v', '20976794', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('66f081886i', '2013-07-19', 'v', '12687712', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('679f68c52i', '2013-07-18', 'v', '22796426', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('684c7c3f6i', '2013-07-18', 'v', '5145150', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('69b977022i', '2013-07-19', 'v', '16562288', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('69f6d6d03i', '2013-07-18', 'v', '21405827', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('6a7c4004ai', '2013-07-18', 'v', '22035020', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('6ad288adei', '2013-07-17', 'v', '10690807', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('6ae19ca14i', '2013-07-17', 'v', '20675303', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('6b13b73ddi', '2013-07-18', 'v', '19650399', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('6b397e1a2i', '2013-07-18', 'v', '63212336', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('6d7b2f534i', '2013-07-19', 'v', '23802965', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('6daf995fdi', '2013-07-17', 'v', '82154134', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('6dc3e818ai', '2013-07-18', 'v', '22558172', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('6de206eb2i', '2013-07-18', 'v', '13459096', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('6df11dbffi', '2013-07-17', 'v', '6017573', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('6df85bb77i', '2013-07-19', 'v', '18809028', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('6e6209753i', '2013-07-17', 'v', '4850461', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('6f24230a8i', '2013-07-18', 'v', '16301238', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('706032ad1i', '2013-07-19', 'v', '22020098', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('70c237bb7i', '2013-07-18', 'v', '20753420', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('70f407982i', '2013-07-17', 'v', '6443291', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('71ed8ccf8i', '2013-07-17', 'v', '12410521', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('71f249b64i', '2013-07-18', 'v', '15217394', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('7213f6e62i', '2013-07-18', 'v', '21424245', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('72fc1073ai', '2013-07-22', 'v', '62031233', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('73034dfbci', '2013-07-19', 'v', '17562116', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('73379fed5i', '2013-07-17', 'v', '17802853', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('738baef4bi', '2013-07-18', 'v', '10236689', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('73df77caei', '2013-07-18', 'v', '20209588', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('740be7000i', '2013-07-17', 'v', '6446241', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('74851df88i', '2013-07-17', 'v', '18364383', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('7529b1742i', '2013-07-19', 'v', '6244210', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('76eb94822i', '2013-07-22', 'v', '13904532', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('771b2c216i', '2013-07-19', 'v', '3790071', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('7852bb191i', '2013-07-17', 'v', '21133081', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('793f15f20i', '2013-07-17', 'v', '18039468', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('7948d9b82i', '2013-07-18', 's', '19966085', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('79ab4cb18i', '2013-07-19', 'v', '18364537', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('79c50b197i', '2013-07-18', 'v', '17754294', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('79ca9c324i', '2013-07-19', 'v', '22048561', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('7a58d4825i', '2013-07-18', 'v', '24277687', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('7a939c089i', '2013-07-19', 's', '20826589', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('7b988a238i', '2013-07-18', 'v', '22359190', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('7ba16cbc4i', '2013-07-18', 'v', '25735809', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('7be776376i', '2013-07-18', 'v', '14518496', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('7bf3aef83i', '2013-07-17', 'v', '16148337', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('7c492bd92i', '2013-07-18', 'v', '16179721', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('7c742f80ci', '2013-07-18', 'v', '23806810', NULL, '04:00:00', NULL, 'port02d', 'a');
INSERT INTO inscripcion VALUES ('7cb8f47f8i', '2013-07-18', 'v', '22618251', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('7cbbab05fi', '2013-07-18', 'v', '6144090', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('7cd3fa163i', '2013-07-17', 'v', '24309002', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('7cf2b0409i', '2013-07-17', 'v', '17153934', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('7d0378fa1i', '2013-07-17', 's', '19753874', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('7dc79524ci', '2013-07-19', 'v', '25229695', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('7e045721ci', '2013-07-19', 'v', '28141100', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('7fd760766i', '2013-07-19', 'v', '6217262', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('80e77ecfai', '2013-07-18', 'v', '21117918', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('81a55ada5i', '2013-07-18', 's', '5614290', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('8222644c1i', '2013-07-18', 'v', '11937465', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('8244aa860i', '2013-07-18', 'v', '23610554', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('832b7fd7fi', '2013-07-17', 'v', '24758212', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('838076259i', '2013-07-18', 'v', '19564542', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('84fe38555i', '2013-07-18', 'v', '19932410', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('852e18555i', '2013-07-17', 'v', '19378202', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('85b815760i', '2013-07-19', 's', '18388780', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('860820b31i', '2013-07-18', 'v', '12410017', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('871aaeb98i', '2013-07-19', 'v', '12395446', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('87b5bdf14i', '2013-07-18', 'v', '13832649', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('89166e28di', '2013-07-17', 'v', '19292438', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('8917ac591i', '2013-07-18', 'v', '21389798', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('894b4054ci', '2013-07-17', 'v', '6101538', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('8956ffa25i', '2013-07-17', 'v', '11225874', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('8b08697f3i', '2013-07-17', 'v', '16937994', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('8b77857abi', '2013-07-17', 'v', '19511927', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('8bf38cdd5i', '2013-07-18', 'v', '20614037', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('8c04e70f4i', '2013-07-18', 'v', '20362454', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('8cfb1ba48i', '2013-07-17', 'v', '24477883', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('8d0ea5368i', '2013-07-18', 'v', '23611674', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('8d9192c74i', '2013-07-19', 'v', '19672699', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('8ddd28be9i', '2013-07-17', 'v', '12954957', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('8de9965f7i', '2013-07-19', 'v', '20911395', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('8e02f77a5i', '2013-07-18', 'v', '84575421', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('8e1d68797i', '2013-07-19', 'v', '7368255', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('8e4613f01i', '2013-07-17', 'v', '16900623', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('8ef474804i', '2013-07-17', 'v', '23574166', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('8f7494703i', '2013-07-18', 'v', '21070849', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('8fb39cfbdi', '2013-07-19', 'v', '6094223', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('8fee5bde3i', '2013-07-19', 'v', '3176091', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('900a8efa6i', '2013-07-17', 'v', '25386830', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('902b26300i', '2013-07-19', 'v', '5593906', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('90441ae17i', '2013-07-17', 'v', '20975351', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('90b005a3ci', '2013-07-17', 'v', '18841566', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('90ddb525fi', '2013-07-18', 'v', '23943152', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('91b13642ci', '2013-07-17', 'v', '15615322', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('93163bccci', '2013-07-17', 'v', '19015153', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('937519722i', '2013-07-19', 'v', '21409561', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('940ff6c3ci', '2013-07-17', 'v', '2608134', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('942946d52i', '2013-07-18', 'v', '14954084', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('952bd1689i', '2013-07-17', 'v', '20675661', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('9530baa3ei', '2013-07-17', 'v', '17983622', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('9581b23d2i', '2013-07-17', 'v', '498805', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('96fcb69e2i', '2013-07-17', 'v', '16086444', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('9833645ffi', '2013-07-17', 'v', '6190018', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('9860e589ai', '2013-07-19', 'v', '20190516', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('98f4c92cbi', '2013-07-18', 'v', '9405243', NULL, '04:00:00', NULL, 'arab01d', 'a');
INSERT INTO inscripcion VALUES ('993485b26i', '2013-07-17', 'v', '23615626', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('99b3a25c7i', '2013-07-19', 'v', '24440415', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('9a0e08131i', '2013-07-19', 'v', '20493145', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('9a18b4c2ei', '2013-07-18', 'v', '19294427', NULL, '04:00:00', NULL, 'port02d', 'a');
INSERT INTO inscripcion VALUES ('9baad9b71i', '2013-07-17', 'v', '3400410', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('9bbbdf097i', '2013-07-19', 'v', '19195164', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('9bbd48088i', '2013-07-18', 'v', '20291286', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('9eaffc595i', '2013-07-17', 'v', '23690132', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('9f0f010bbi', '2013-07-22', 'v', '18004816', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('9f234ef41i', '2013-07-18', 'v', '19148540', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('9f50e495ai', '2013-07-18', 'v', '20307169', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('a052ff5d6i', '2013-07-19', 'v', '19754615', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('a0735f446i', '2013-07-18', 'v', '15161930', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('a15245209i', '2013-07-19', 's', '82296765', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('a18935b52i', '2013-07-18', 'v', '18223977', NULL, '04:00:00', NULL, 'arab01d', 'a');
INSERT INTO inscripcion VALUES ('a1f8d7b46i', '2013-07-17', 'v', '24655639', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('a3fa40479i', '2013-07-18', 'v', '6208396', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('a3ff8dce7i', '2013-07-17', 'v', '6136474', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('a4771e09ai', '2013-07-18', 'v', '2990891', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('a566e5588i', '2013-07-18', 'v', '19531282', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('a5c3c8d4fi', '2013-07-17', 'v', '15327668', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('a5f91574bi', '2013-07-19', 'v', '24335316', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('a6ad1819ai', '2013-07-19', 'v', '13459689', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('a6ad50624i', '2013-07-18', 'v', '23850172', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('a84bf8471i', '2013-07-17', 'v', '21706956', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('a8592fe09i', '2013-07-19', 'v', '20127400', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('a8bc3613fi', '2013-07-19', 'v', '14784614', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('a8f6c51afi', '2013-07-17', 'v', '24940048', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('a96974a9fi', '2013-07-18', 'v', '19710582', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('aa253b389i', '2013-07-17', 's', '19561302', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('aa4859697i', '2013-07-17', 'v', '15804302', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('acd9836a1i', '2013-07-19', 'v', '19965464', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('ad05106dei', '2013-07-18', 'v', '19378752', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('ad73c89a6i', '2013-07-17', 'v', '12575455', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('ae138a631i', '2013-07-18', 'v', '82211217', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('aed56d67ci', '2013-07-18', 'v', '19642773', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('aedf7c97fi', '2013-07-22', 's', '4253850', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('af88cca3ai', '2013-07-17', 'v', '12955762', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('aff540409i', '2013-07-18', 'v', '20095455', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('b0d57cd12i', '2013-07-18', 'v', '16430446', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('b18e89616i', '2013-07-17', 'v', '25367842', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('b215fb97ci', '2013-07-19', 's', '18641635', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('b22034d8di', '2013-07-19', 'v', '6101812', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('b22b7c89di', '2013-07-17', 'v', '5425601', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('b2bd015c3i', '2013-07-19', 's', '22906943', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('b2ecc3e86i', '2013-07-22', 'v', '3959429', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('b32ba402fi', '2013-07-18', 'v', '20747366', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('b344d523bi', '2013-07-18', 'v', '24939913', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('b37ddee0fi', '2013-07-17', 'v', '24749047', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('b3c88e32bi', '2013-07-17', 'v', '19066805', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('b51e6f277i', '2013-07-18', 'v', '4594745', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('b54968df2i', '2013-07-18', 'v', '17932338', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('b6fb35ea3i', '2013-07-18', 'v', '23690261', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('b6fc57fe8i', '2013-07-18', 'v', '19819715', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('b82a101ffi', '2013-07-17', 'v', '16544244', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('b890ae3e4i', '2013-07-19', 's', '17158282', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('b895ce27ai', '2013-07-19', 'v', '21016479', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('b8fa23c97i', '2013-07-17', 'v', '4349119', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('b9226deefi', '2013-07-18', 'v', '19789602', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('b92bc4131i', '2013-07-18', 's', '24456052', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('ba0b67541i', '2013-07-17', 'v', '17718563', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('baa25f1b1i', '2013-07-18', 'v', '25136343', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('bacca6feei', '2013-07-17', 'v', '24313246', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('bb7381341i', '2013-07-17', 'v', '6431221', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('bd4f462edi', '2013-07-17', 'v', '19587512', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('be497adaai', '2013-07-17', 'v', '19711616', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('bea3f3ebei', '2013-07-17', 'v', '4441084', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('bf3119494i', '2013-07-17', 'v', '19195434', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('bffda36bbi', '2013-07-17', 'v', '14391985', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('c017fa6d6i', '2013-07-17', 'v', '6469164', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('c12fdc074i', '2013-07-19', 'v', '19292435', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('c1cf5380ci', '2013-07-17', 'v', '21283155', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('c22a9c0cdi', '2013-07-18', 'v', '81072197', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('c2c894ac8i', '2013-07-18', 'v', '17563504', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('c34e779c2i', '2013-07-17', 'v', '16284976', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('c38d0386fi', '2013-07-17', 'v', '16568405', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('c3f092d7ci', '2013-07-17', 'v', '17343908', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('c40ff2008i', '2013-07-17', 'v', '19398177', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('c5188b91ei', '2013-07-18', 'v', '19720670', NULL, '04:00:00', NULL, 'port02d', 'a');
INSERT INTO inscripcion VALUES ('c621eb3d4i', '2013-07-18', 'v', '21323013', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('c72c827c1i', '2013-07-17', 'v', '23529324', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('c7ed25bffi', '2013-07-17', 'v', '15812170', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('c7eedcf38i', '2013-07-18', 'v', '23185323', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('c88eb6935i', '2013-07-18', 'v', '25845674', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('c95e144e0i', '2013-07-18', 'v', '24408861', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('ca5e394f6i', '2013-07-17', 'v', '13224255', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('cb6da0478i', '2013-07-18', 'v', '17148460', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('cbb1f2eafi', '2013-07-18', 'v', '21183699', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('cc2ce54c5i', '2013-07-18', 'v', '23194364', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('cc54d0d44i', '2013-07-17', 'v', '19255885', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('cc7a8c554i', '2013-07-19', 'v', '5113055', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('cdbc23d2fi', '2013-07-18', 's', '24234087', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('ce6f182dbi', '2013-07-17', 'v', '18001076', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('cfeb64492i', '2013-07-17', 'v', '18753791', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('d18928645i', '2013-07-18', 'v', '3803226', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('d1c4acfb2i', '2013-07-17', 'v', '23425475', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('d1d0001cei', '2013-07-18', 'v', '20673633', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('d283e5f45i', '2013-07-17', 'v', '4684445', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('d3074aec1i', '2013-07-19', 'v', '17667183', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('d36c75da7i', '2013-07-23', 'v', '6264676', NULL, '04:00:00', NULL, 'arab01d', 'a');
INSERT INTO inscripcion VALUES ('d4f06cf1fi', '2013-07-18', 'v', '22974836', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('d56e7aebdi', '2013-07-19', 'v', '6496568', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('d5f739001i', '2013-07-18', 'v', '25773523', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('d6793b22bi', '2013-07-18', 'v', '8346353', NULL, '04:00:00', NULL, 'port02d', 'a');
INSERT INTO inscripcion VALUES ('d686a8732i', '2013-07-17', 'v', '20756538', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('d68e572c4i', '2013-07-18', 'v', '23196102', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('d6db1dba7i', '2013-07-18', 'v', '20827310', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('d791bcb48i', '2013-07-18', 'v', '15585363', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('d792fa941i', '2013-07-17', 'v', '19581348', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('d7b968872i', '2013-07-18', 'v', '25019347', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('d7baa5b96i', '2013-07-18', 'v', '3625060', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('d7c7c7595i', '2013-07-18', 'v', '5421346', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('e6fa32daci', '2013-07-19', 'v', '18728132', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('e76897141i', '2013-07-18', 'v', '9147984', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('e80cc1141i', '2013-07-17', 'v', '19733686', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('e94f4eb6ei', '2013-07-18', 'v', '22567175', NULL, '04:00:00', NULL, 'port02d', 'a');
INSERT INTO inscripcion VALUES ('e957af284i', '2013-07-18', 'v', '21615196', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('e98c272dfi', '2013-07-17', 'v', '22015125', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('ea8307d17i', '2013-07-17', 'v', '6303212', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('eb94c4b41i', '2013-07-18', 'v', '20615886', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('ec63db9cci', '2013-07-18', 'v', '18912245', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('ecf071c1ei', '2013-07-18', 'v', '5013371', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('ecf26e1a4i', '2013-07-18', 'v', '21618138', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('ee24d7133i', '2013-07-19', 'v', '23682791', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('ee8917037i', '2013-07-18', 'v', '22035431', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('efc6d189bi', '2013-07-18', 'v', '84416248', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('f05f3f43ci', '2013-07-19', 'v', '25689120', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('f08bd5c14i', '2013-07-18', 'v', '22493565', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('f09cf4962i', '2013-07-18', 'v', '20794768', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('f0c2b3feei', '2013-07-22', 'v', '19736418', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('f0d2c5cb7i', '2013-07-18', 'v', '23691255', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('f1cf22449i', '2013-07-18', 'v', '19764233', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('f259b2f54i', '2013-07-17', 'v', '18441611', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('f436f5e3ci', '2013-07-18', 'v', '84416011', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('f51c3cb72i', '2013-07-22', 'v', '14351766', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('c3cc06edfi', '2013-07-19', 'v', '6275138', NULL, '04:00:00', 2, 'lsv01d', 'a');
INSERT INTO inscripcion VALUES ('0848fedf3i', '2013-07-17', 'v', '3817461', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('08e34ab88i', '2013-07-17', 'v', '16084580', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('09ab7eff9i', '2013-07-18', 'v', '18819097', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('0a02ea0b0i', '2013-07-17', 'v', '17691996', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('0af4b1a82i', '2013-07-18', 'v', '15148249', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('0b05de0abi', '2013-07-17', 'v', '4245444', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('0b16d2865i', '2013-07-23', 'v', '4421580', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('0b715ab4ci', '2013-07-17', 'v', '6248749', NULL, '04:00:00', NULL, 'wayuu', 'a');
INSERT INTO inscripcion VALUES ('0bd0b82adi', '2013-07-17', 'v', '15976145', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('0c0614738i', '2013-07-17', 'v', '23692671', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('0d72cf6a6i', '2013-07-18', 'v', '25011390', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('0d7a308dai', '2013-07-17', 'v', '21374791', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('0decfcdb5i', '2013-07-18', 'v', '17386985', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('0ed6ad523i', '2013-07-19', 'v', '19060343', NULL, '04:00:00', NULL, 'ita01t', 'a');
INSERT INTO inscripcion VALUES ('11225c683i', '2013-07-18', 'v', '4252760', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('11783c6cei', '2013-07-17', 'v', '6399097', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('124f4250ei', '2013-07-17', 'v', '12261246', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('13bff4b43i', '2013-07-19', 'v', '19650318', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('13f56a704i', '2013-07-18', 'v', '17560355', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('1498f362bi', '2013-07-18', 'v', '24740073', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('149b41241i', '2013-07-17', 'v', '4507829', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('15ad8cceai', '2013-07-17', 'v', '21413609', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('15ef3e04di', '2013-07-18', 'v', '10786113', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('15fa3e1dfi', '2013-07-18', 'v', '16901836', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('169e92e0fi', '2013-07-18', 'v', '16850907', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('17040b365i', '2013-07-17', 'v', '23693302', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('1799687eei', '2013-07-17', 'v', '15440972', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('181bd3d63i', '2013-07-17', 'v', '18676151', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('18ae75aadi', '2013-07-17', 'v', '19851664', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('18cf67a7ei', '2013-07-18', 'v', '17478216', NULL, '04:00:00', NULL, 'port02d', 'a');
INSERT INTO inscripcion VALUES ('18edbc0d0i', '2013-07-18', 's', '20827399', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('194dad895i', '2013-07-18', 'v', '11308776', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('198a35774i', '2013-07-19', 'v', '5589517', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('1a031912fi', '2013-07-17', 'v', '20210105', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('1a50cf227i', '2013-07-17', 'v', '84481156', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('1ab6c6d4bi', '2013-07-17', 'v', '23642804', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('1b50b7b15i', '2013-07-18', 'v', '18027541', NULL, '04:00:00', NULL, 'fra01d', 'a');
INSERT INTO inscripcion VALUES ('1bc346559i', '2013-07-19', 'v', '6464528', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('1bcafe284i', '2013-07-18', 'v', '11920619', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('1c473c56ci', '2013-07-19', 'v', '16032169', NULL, '04:00:00', NULL, 'ing05d', 'a');
INSERT INTO inscripcion VALUES ('1cadbd5cci', '2013-07-18', 'v', '17531471', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('1dc3f50eei', '2013-07-18', 'v', '17474240', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('1e6e0101di', '2013-07-19', 'v', '3662150', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('0f25a71d2i', '2013-07-17', 'v', '17076666', NULL, '04:00:00', 4, 'lsv02t', 'a');
INSERT INTO inscripcion VALUES ('d7ffe0479i', '2013-07-17', 'v', '22015128', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('d8085912fi', '2013-07-18', 'v', '24981765', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('d82a86c00i', '2013-07-18', 'v', '17793954', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('d88bd082di', '2013-07-19', 'v', '4419878', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('d9a111764i', '2013-07-17', 'v', '14531735', NULL, '04:00:00', NULL, 'ing02t', 'a');
INSERT INTO inscripcion VALUES ('d9bdf9c37i', '2013-07-19', 'v', '13162465', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('da1a07be9i', '2013-07-18', 'v', '5096173', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('da79a272bi', '2013-07-18', 'v', '10513731', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('dadfac026i', '2013-07-23', 'v', '24758965', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('dae3036c0i', '2013-07-18', 'v', '13067965', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('db06dda0ci', '2013-07-18', 'v', '25716256', NULL, '04:00:00', NULL, 'fra01t', 'a');
INSERT INTO inscripcion VALUES ('dbc89afd7i', '2013-07-19', 'v', '19418205', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('dc95e2431i', '2013-07-19', 'v', '20910537', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('dcbc2d030i', '2013-07-18', 'v', '17533289', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('dd55c8891i', '2013-07-18', 'v', '17268270', NULL, '04:00:00', NULL, 'fra02t', 'a');
INSERT INTO inscripcion VALUES ('dd7c88592i', '2013-07-17', 'v', '15366003', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('dd9238f41i', '2013-07-19', 'v', '7998182', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('de9dfbc7fi', '2013-07-23', 'v', '16457756', NULL, '04:00:00', NULL, 'arab01d', 'a');
INSERT INTO inscripcion VALUES ('defa79117i', '2013-07-17', 'v', '22330865', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('e0e3dd89ei', '2013-07-18', 'v', '22048767', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('e0ee34fe1i', '2013-07-19', 'v', '22611049', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('e11507612i', '2013-07-18', 'v', '14756420', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('e1d82a10ci', '2013-07-17', 'v', '22020334', NULL, '04:00:00', NULL, 'ing06d', 'a');
INSERT INTO inscripcion VALUES ('e20de52bfi', '2013-07-18', 'v', '4834371', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('e3053292ci', '2013-07-17', 'v', '15616204', NULL, '04:00:00', NULL, 'ing04d', 'a');
INSERT INTO inscripcion VALUES ('e37fbc1e7i', '2013-07-19', 'v', '24277968', NULL, '04:00:00', NULL, 'rus01t', 'a');
INSERT INTO inscripcion VALUES ('e3d8ca475i', '2013-07-18', 'v', '17166021', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('e443adf99i', '2013-07-18', 'v', '17906399', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('e44f442a5i', '2013-07-17', 'v', '17741716', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('e56b374a9i', '2013-07-17', 's', '24758315', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('e5aa00800i', '2013-07-18', 'v', '17215171', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('e5df86752i', '2013-07-22', 'v', '11448120', NULL, '04:00:00', NULL, 'chin01d', 'a');
INSERT INTO inscripcion VALUES ('f59462ae0i', '2013-07-18', 'v', '18994269', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('f625c9f43i', '2013-07-18', 'v', '16811940', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('f6be5cc1bi', '2013-07-17', 'v', '3231059', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('f7f4c1208i', '2013-07-18', 'v', '5279754', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('f8e58742fi', '2013-07-22', 's', '6096050', NULL, '04:00:00', NULL, 'arab01n', 'a');
INSERT INTO inscripcion VALUES ('f90892a4ci', '2013-07-18', 'v', '16604386', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('f9189d1fai', '2013-07-18', 'v', '24222864', NULL, '04:00:00', NULL, 'port01d', 'a');
INSERT INTO inscripcion VALUES ('fa4446150i', '2013-07-22', 'v', '23695632', NULL, '04:00:00', NULL, 'fra03d', 'a');
INSERT INTO inscripcion VALUES ('fcf194a52i', '2013-07-19', 'v', '16905375', NULL, '04:00:00', NULL, 'ita01d', 'a');
INSERT INTO inscripcion VALUES ('fd718b398i', '2013-07-18', 'v', '22493587', NULL, '04:00:00', NULL, 'fra02d', 'a');
INSERT INTO inscripcion VALUES ('fdbf3629di', '2013-07-17', 'v', '16114139', NULL, '04:00:00', NULL, 'alem01d', 'a');
INSERT INTO inscripcion VALUES ('fe1e6f95di', '2013-07-18', 'v', '15200857', NULL, '04:00:00', NULL, 'port03n', 'a');
INSERT INTO inscripcion VALUES ('ff5c23274i', '2013-07-22', 'v', '18025015', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('ff7edba8ai', '2013-07-18', 'v', '6331894', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('ff9c6cea8i', '2013-07-19', 'v', '20913481', NULL, '04:00:00', NULL, 'fra04d', 'a');
INSERT INTO inscripcion VALUES ('ffb1f07c7i', '2013-07-18', 'v', '10194962', NULL, '04:00:00', NULL, 'port02d', 'a');


--
-- Data for Name: profesor; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO profesor VALUES ('03', 3, 'v', 'daisi', '', 'de sá', '', '', '', '3');
INSERT INTO profesor VALUES ('04', 4, 'v', 'trinidad', '', 'blak', '', '', '', '4');
INSERT INTO profesor VALUES ('05', 5, 'v', 'daniel', '', 'sánchez', '', '', '', '5');
INSERT INTO profesor VALUES ('06', 6, 'v', 'gabriela', '', 'centeno', '', '', '', '6');
INSERT INTO profesor VALUES ('07', 7, 'v', 'margarita', '', 'da silva', '', '', '', '7');
INSERT INTO profesor VALUES ('08', 8, 'v', 'maria', '', 'urbina', '', '', '', '8');
INSERT INTO profesor VALUES ('09', 9, 'v', 'mohamed', '', 'kessentini', '', '', '', '9');
INSERT INTO profesor VALUES ('011', 11, 'v', 'nury', '', 'perez', '', '', '', '11');
INSERT INTO profesor VALUES ('012', 12, 'v', 'marisel', '', 'espinoza', '', '', '', '12');
INSERT INTO profesor VALUES ('013', 13, 'v', 'wilber', '', 'govea', '', '', '', '13');
INSERT INTO profesor VALUES ('014', 14, 'v', 'jhon', '', 'quiñonez', '', '', '', '14');
INSERT INTO profesor VALUES ('015', 15, 'v', '', '', '', '', '', '', '15');
INSERT INTO profesor VALUES ('016', 16, 'v', 'maria', '', 'rojas', '', '', '', '16');
INSERT INTO profesor VALUES ('017', 17, 'v', 'bladimir', '', 'ragas', '', '', '', '17');
INSERT INTO profesor VALUES ('018', 18, 'v', 'raidiry', '', 'fuentes', '', '', '', '18');
INSERT INTO profesor VALUES ('01', 1, 'v', 'yris', '', 'rodriguez', '', '', '', '1');
INSERT INTO profesor VALUES ('010', 10, 'v', 'jenifer', '', 'rodriguez', '', '', '', '10');
INSERT INTO profesor VALUES ('02', 2, 'v', 'elizabeth', '', 'pires', '', '', '', '2');


--
-- Data for Name: seccion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO seccion VALUES ('fra01t', 'fra', 1, 10, '06', 'a');
INSERT INTO seccion VALUES ('fra02d', 'fra', 1, 35, '07', 'a');
INSERT INTO seccion VALUES ('fra02t', 'fra', 1, 35, '08', 'a');
INSERT INTO seccion VALUES ('fra03d', 'fra', 1, 35, '07', 'a');
INSERT INTO seccion VALUES ('fra04d', 'fra', 1, 35, '06', 'a');
INSERT INTO seccion VALUES ('ing02t', 'ing', 1, 35, '02', 'a');
INSERT INTO seccion VALUES ('ing04d', 'ing', 1, 35, '01', 'a');
INSERT INTO seccion VALUES ('ing05d', 'ing', 1, 35, '016', 'a');
INSERT INTO seccion VALUES ('ing06d', 'ing', 1, 35, '017', 'a');
INSERT INTO seccion VALUES ('ita01d', 'ita', 1, 10, '018', 'a');
INSERT INTO seccion VALUES ('ita01t', 'ita', 1, 10, '018', 'a');
INSERT INTO seccion VALUES ('kar01', 'kar', 1, 35, '015', 'a');
INSERT INTO seccion VALUES ('lsv01d', 'lsv', 1, 15, '010', 'a');
INSERT INTO seccion VALUES ('lsv01t', 'lsv', 1, 15, '010', 'a');
INSERT INTO seccion VALUES ('lsv02d', 'lsv', 1, 15, '011', 'a');
INSERT INTO seccion VALUES ('lsv02t', 'lsv', 1, 35, '012', 'a');
INSERT INTO seccion VALUES ('port01d', 'port', 1, 10, '02', 'a');
INSERT INTO seccion VALUES ('port02d', 'port', 1, 10, '04', 'a');
INSERT INTO seccion VALUES ('port03n', 'port', 1, 35, '03', 'a');
INSERT INTO seccion VALUES ('rus01t', 'rus', 1, 25, '014', 'a');
INSERT INTO seccion VALUES ('wayuu', 'wayuu', 1, 25, '013', 'a');
INSERT INTO seccion VALUES ('alem01d', 'alem', 1, 24, '05', 'a');
INSERT INTO seccion VALUES ('arab01d', 'arab', 1, 25, '09', 'a');
INSERT INTO seccion VALUES ('arab01n', 'arab', 1, 25, '09', 'a');
INSERT INTO seccion VALUES ('chin01d', 'chin', 1, 25, '015', 'a');
INSERT INTO seccion VALUES ('fra01d', 'fra', 1, 10, '06', 'a');


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuario VALUES ('1', '1', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('10', '10', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('11', '11', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('00124e3d40', '14534334ubv', '00124e3d40cb1cccc392be4c69c41c30', 'm3ch21@hotmail.com', 'e');
INSERT INTO usuario VALUES ('0019cbe362', '10537691ubv', '0019cbe3626e68f78d27f15be9fe8d13', 'notienes@hotmail.com', 'e');
INSERT INTO usuario VALUES ('00a948b12f', '19692840ubv', '00a948b12fe2ba721e00d2e8fb838024', 'difda.constan@gmail.com', 'e');
INSERT INTO usuario VALUES ('01eadb236f', '20605915ubv', '01eadb236f352f99b9b782b23f2eda23', 'gonzalez_salcedovictoria@hotmail.com', 'e');
INSERT INTO usuario VALUES ('02e62551a2', '23707350ubv', '02e62551a2449a020c41dacb548c9e7b', 'brando1946@gmail.com', 'e');
INSERT INTO usuario VALUES ('03e9e3a077', '26414525ubv', '03e9e3a07762c147690d2e5254a7eeea', 'frannar777@gmail.com', 'e');
INSERT INTO usuario VALUES ('0463f0bca7', '23613778ubv', '0463f0bca729a6085923ceef28a65f2e', 'maariiale@gmail.com', 'e');
INSERT INTO usuario VALUES ('047f6d2538', '19868074ubv', '047f6d2538186509dfdd179f9f9e71f0', 'miguelpad1500@yahoo.com.ve', 'e');
INSERT INTO usuario VALUES ('0583c634c9', '6453629ubv', '0583c634c9809dbbc53e943b12bb0cf6', 'iraimaguedes2012@hotmail.com', 'e');
INSERT INTO usuario VALUES ('05e6c804b2', '4166620ubv', '05e6c804b2168cccc25833e40272371a', 'misionerosdelacomunicacion@gmail.com', 'e');
INSERT INTO usuario VALUES ('06415c0d92', '12076432ubv', '06415c0d925fe8c99e4d612d50060abf', 'josenixon33@hotmail.com', 'e');
INSERT INTO usuario VALUES ('074565f093', '20489202ubv', '074565f093698fa254483cba16653033', 'gegegeral07@hotmail.com', 'e');
INSERT INTO usuario VALUES ('0769268480', '18388749ubv', '07692684806dcae0da0d9b41bb8ca1d3', 'dianazurita_7@hotmail.com', 'e');
INSERT INTO usuario VALUES ('0848fedf38', '3817461ubv', '0848fedf38531fc49ec9b51963d7bcaa', 'lunadec@gmail.com', 'e');
INSERT INTO usuario VALUES ('08e34ab887', '16084580ubv', '08e34ab887ac9669a06acdf8d17e979e', 'miguelescudero_9@hotmail.com', 'e');
INSERT INTO usuario VALUES ('09ab7eff9f', '18819097ubv', '09ab7eff9f6739176eed554257340a24', 'FCFIVE@HOTMAIL.COM', 'e');
INSERT INTO usuario VALUES ('0a02ea0b01', '17691996ubv', '0a02ea0b01e59fbbf07f7d84a7479997', 'yerarding_sosa@hotmail.com', 'e');
INSERT INTO usuario VALUES ('0af4b1a82e', '15148249ubv', '0af4b1a82e8d1aeeac220c1c45660c84', 'alexnis.silvera@gmail.com', 'e');
INSERT INTO usuario VALUES ('0b05de0ab9', '4245444ubv', '0b05de0ab97f0f5a1f4ba36be28da2d1', 'magalismhdp@hotmail.com', 'e');
INSERT INTO usuario VALUES ('0b16d28653', '4421580ubv', '0b16d286533ca0ab34d0ecd6cdc83461', 'josevalerioortega@hotmail.com', 'e');
INSERT INTO usuario VALUES ('0b715ab4c4', '6248749ubv', '0b715ab4c4a5b2a76fb958a0efdb5466', 'myparras@gmail.com', 'e');
INSERT INTO usuario VALUES ('0bd0b82ad6', '15976145ubv', '0bd0b82ad6a50a3dab9f8d03b9c57526', 'jlfm24@gmail.com', 'e');
INSERT INTO usuario VALUES ('0c0614738b', '23692671ubv', '0c0614738b289bf4db1ffa4f800d8d6c', 'daniben1911@gmail.com', 'e');
INSERT INTO usuario VALUES ('0d72cf6a63', '25011390ubv', '0d72cf6a632e30a16d76f66a0b1738a9', 'jcmartinezzz@hotmail.com', 'e');
INSERT INTO usuario VALUES ('0d7a308da4', '21374791ubv', '0d7a308da427f9f4e36bc1a3214bcb0c', 'jpiscis_15@hotmail.com', 'e');
INSERT INTO usuario VALUES ('0decfcdb5a', '17386985ubv', '0decfcdb5a93b9b9f739fcb474b68d3e', 'eusse234@gmail.com', 'e');
INSERT INTO usuario VALUES ('0ed6ad523b', '19060343ubv', '0ed6ad523b82b846eea5de8976d547bf', 'bryanbarrios2@gmail.com', 'e');
INSERT INTO usuario VALUES ('0f25a71d2d', '17076666ubv', '0f25a71d2d455c9d5912ffdcd0e257f8', 'dminnely@hotmail.com', 'e');
INSERT INTO usuario VALUES ('11225c6834', '4252760ubv', '11225c683426415154c0e9335221469d', 'luisbarreto08@hotmail.com', 'e');
INSERT INTO usuario VALUES ('11783c6ce6', '6399097ubv', '11783c6ce69681ac78127b7e7a6ab586', 'utreralesb@yahoo.es', 'e');
INSERT INTO usuario VALUES ('124f4250e4', '12261246ubv', '124f4250e45904a7756856446d271fd0', 'alvaromontes29@hotmail.com', 'e');
INSERT INTO usuario VALUES ('13bff4b436', '19650318ubv', '13bff4b436b2df8950635ee89af1f4b8', 'stuar_ncn@hotmail.com', 'e');
INSERT INTO usuario VALUES ('13f56a7044', '17560355ubv', '13f56a7044d44d266e9db6cde70769a6', 'joshy250@gmail.com', 'e');
INSERT INTO usuario VALUES ('1498f362b3', '24740073ubv', '1498f362b30fdea32d1671e314d2ec1c', 'rafa_vasquez_a@hotmail.com', 'e');
INSERT INTO usuario VALUES ('149b412411', '4507829ubv', '149b41241147d44acc5341ed0971f867', 'alexguzman87@gmail.com', 'e');
INSERT INTO usuario VALUES ('15ad8ccea3', '21413609ubv', '15ad8ccea31ac4f625e9433345466049', 'marianalaloca29@hotmail.com', 'e');
INSERT INTO usuario VALUES ('15ef3e04d0', '10786113ubv', '15ef3e04d0ddac623bb3446699696a09', 'fjmolina71@hotmail.com', 'e');
INSERT INTO usuario VALUES ('15fa3e1df1', '16901836ubv', '15fa3e1df1ad7cb8a3dd9ec8af4b8c2a', 'okey636@hotmail.com', 'e');
INSERT INTO usuario VALUES ('169e92e0f0', '16850907ubv', '169e92e0f0721b7b8cf5e9b603548578', 'jrrg84@gmail.com', 'e');
INSERT INTO usuario VALUES ('17040b3656', '23693302ubv', '17040b36560789da9084b2d053b1003d', 'rasalad@hotmail.com', 'e');
INSERT INTO usuario VALUES ('1799687ee5', '15440972ubv', '1799687ee5640b69328aa64cc617dd45', 'anaanteliz@gmail.com', 'e');
INSERT INTO usuario VALUES ('181bd3d634', '18676151ubv', '181bd3d63484a1bf344c56b0194e37ac', 'michaelwetzstein_26@hotmail.com', 'e');
INSERT INTO usuario VALUES ('18ae75aada', '19851664ubv', '18ae75aada74a9fdcb407502f7f17bff', 'rodiguezp_carlos@hotmail.com', 'e');
INSERT INTO usuario VALUES ('18cf67a7e3', '17478216ubv', '18cf67a7e371feb7e29a95da98ed27eb', 'yicel_perez@yahoo.com', 'e');
INSERT INTO usuario VALUES ('18edbc0d04', '20827399ubv', '18edbc0d04e5a2741c321815f617df1d', 'dari.saher@gmail.com', 'e');
INSERT INTO usuario VALUES ('194dad8951', '11308776ubv', '194dad8951abd5715ab23378fe2d7c09', 'ninadejesusn@hotmail.com', 'e');
INSERT INTO usuario VALUES ('198a357748', '5589517ubv', '198a357748140424d4aebe80db030448', 'mr.blsr@gmail.com', 'e');
INSERT INTO usuario VALUES ('1a031912f8', '20210105ubv', '1a031912f8211946c439ff7fadcacad2', 'alruzam@gmail.com', 'e');
INSERT INTO usuario VALUES ('1a50cf2273', '84481156ubv', '1a50cf227325300ea4999851fecdfa5a', 'palacios.ferney.1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('1ab6c6d4ba', '23642804ubv', '1ab6c6d4babd372d732ab3c54c67fa22', 'osmarydelgado_tj@hotmail.com', 'e');
INSERT INTO usuario VALUES ('1b50b7b159', '18027541ubv', '1b50b7b15969eccea1e41fd4a9606d42', 'carolbonie24@hotmail.com', 'e');
INSERT INTO usuario VALUES ('1bc346559d', '6464528ubv', '1bc346559db57860ce96f5a2065a96cc', 'darisnava@hotmail.com', 'e');
INSERT INTO usuario VALUES ('1bcafe2844', '11920619ubv', '1bcafe2844fc14b0ad92de1a5f9f863d', 'hevelynewman@yahoo.es', 'e');
INSERT INTO usuario VALUES ('1c473c56cb', '16032169ubv', '1c473c56cbf138174783e84d54ae5da2', 'laly009@gmail.com', 'e');
INSERT INTO usuario VALUES ('1cadbd5cc1', '17531471ubv', '1cadbd5cc1a273417626b20024d18ad3', 'anallyc@gmail.com', 'e');
INSERT INTO usuario VALUES ('12', '12', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('13', '13', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('14', '14', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('15', '15', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('16', '16', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('17', '17', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('18', '18', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('1dc3f50ee1', '17474240ubv', '1dc3f50ee1392cd5a7001110a413bef8', 'yolis1809@gmail.com', 'e');
INSERT INTO usuario VALUES ('1e6e0101d5', '3662150ubv', '1e6e0101d57e440e2ef26769f5d13dd4', 'marfe12@gmail.com', 'e');
INSERT INTO usuario VALUES ('1f1d2e459a', '7952027ubv', '1f1d2e459ac09719e6d022e6f43e62ed', 'mariaalvarado@gmail.com', 'e');
INSERT INTO usuario VALUES ('1f393a6d9c', '15098340ubv', '1f393a6d9c7814a974c8a4370b24af1c', 'jevjaf@gmail.com', 'e');
INSERT INTO usuario VALUES ('1fc31aae67', '16890948ubv', '1fc31aae673538c7667203adbb77fcf8', 'joha_lys@hotmail.com', 'e');
INSERT INTO usuario VALUES ('1fee5de0b3', '6127172ubv', '1fee5de0b3293c18d4bdfa00df876c1e', 'haffarelias@yahoo.es', 'e');
INSERT INTO usuario VALUES ('2181b6975e', '18445456ubv', '2181b6975ebe9dc28e191c2928ad7cd2', 'kar.i_i@hotmail.com', 'e');
INSERT INTO usuario VALUES ('218729862f', '13864801ubv', '218729862f1e4879faac263d236ebcae', 'anagracielalinares@hotmail.com', 'e');
INSERT INTO usuario VALUES ('226a34e6b4', '19518496ubv', '226a34e6b418cca261f45434da8b6922', 'aaaaaa@aaaa.com', 'e');
INSERT INTO usuario VALUES ('22a2ab2066', '20761303ubv', '22a2ab2066283c926757b3496263cdc5', 'icoa12@gmail.com', 'e');
INSERT INTO usuario VALUES ('23d0b85fae', '18042321ubv', '23d0b85fae589e52f6834af453bf5ee0', 'kleiner2424@gmail.com', 'e');
INSERT INTO usuario VALUES ('2430efd065', '21706953ubv', '2430efd065ed669568caed71d136b4ac', 'bedanit_1512@hotmail.com', 'e');
INSERT INTO usuario VALUES ('24d3cfe569', '13832848ubv', '24d3cfe5695ad072eebc0ced84c91adf', 'megamayra41@hotmail.es', 'e');
INSERT INTO usuario VALUES ('2539eaa2e0', '4815716ubv', '2539eaa2e0ba3741f8790208cd17c78a', 'doris1@yahoo.com', 'e');
INSERT INTO usuario VALUES ('25ce306582', '5565434ubv', '25ce3065824610f33d4a486dd970410b', 'belkysguerrero31@gmail.com', 'e');
INSERT INTO usuario VALUES ('265b73bf79', '16564590ubv', '265b73bf791a3483068504e72cb8ebd8', 'luiscrivas@gmail.com', 'e');
INSERT INTO usuario VALUES ('2800868444', '19711843ubv', '2800868444f343d7146c89103d8b8cbc', 'ellie_good99@hotmail.com', 'e');
INSERT INTO usuario VALUES ('299c9248e5', '26483144ubv', '299c9248e5de1ec3ba5546b6eea896ca', 'elcamaleonj@hotmail.com', 'e');
INSERT INTO usuario VALUES ('29b04103a7', '19065524ubv', '29b04103a7567c249f1ebecb4dc279ea', 'damelisvera4@hotmail.com', 'e');
INSERT INTO usuario VALUES ('2a431ca39b', '22690149ubv', '2a431ca39b590d0b626661bfc3a4b931', 'imghost023@gmail.com', 'e');
INSERT INTO usuario VALUES ('2ac99c2493', '6810890ubv', '2ac99c24938da53654dc2fe04f178d04', 'soniacar@hotmail.com', 'e');
INSERT INTO usuario VALUES ('2ad7bebf43', '16659596ubv', '2ad7bebf43a320094ec1e8b29fd35012', 'adrian.orland17@gmail.com', 'e');
INSERT INTO usuario VALUES ('2b060bbc3d', '19015578ubv', '2b060bbc3dc6594e9e5ec2c23fc0ea0a', 'paomv25@hotmail.com', 'e');
INSERT INTO usuario VALUES ('2c55efc87e', '25867438ubv', '2c55efc87eb99824a86d8b444fc9afc1', 'gabycuchi@hotmail.com', 'e');
INSERT INTO usuario VALUES ('2c992d9b83', '5904501ubv', '2c992d9b834ae65648e3e364e678ed35', 'beatrizrodriguezb1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('2ce9788ea4', '6836369ubv', '2ce9788ea448ef9141526284da3681a0', 'zulay11h@hotmail.com', 'e');
INSERT INTO usuario VALUES ('2d045f86c4', '6399978ubv', '2d045f86c4780002c03f2845ea1f925d', 'carolhr677@gmail.com', 'e');
INSERT INTO usuario VALUES ('2da45debea', '11986411ubv', '2da45debea7e64c6fb55ac30b52ffff9', 'ylianec@gmail.com', 'e');
INSERT INTO usuario VALUES ('2f3817b5ec', '20605914ubv', '2f3817b5ecbfed9307a9f60a3b3853e7', 'la.heavy.metal@hotmail.com', 'e');
INSERT INTO usuario VALUES ('2f8439f0bf', '19717657ubv', '2f8439f0bfbe9480f304854ada0ebe00', 'sucre.mirian@gmail.com', 'e');
INSERT INTO usuario VALUES ('30d074b494', '19087326ubv', '30d074b494d5d6ad796c976c772298f0', 'leofernan71@gmail.com', 'e');
INSERT INTO usuario VALUES ('30db7669fb', '15856401ubv', '30db7669fb120929ebe3c84e57b0ed9c', 'adrianacollnts@hotmail.com', 'e');
INSERT INTO usuario VALUES ('30f138400f', '6230855ubv', '30f138400f0b8b56e4935b25b0d973f2', 'mendcord@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3190547442', '18029158ubv', '31905474427dbd3a997c5d04c4d0f2e5', 'rosana.sanchezr@gmail.com', 'e');
INSERT INTO usuario VALUES ('32187cfc02', '11559219ubv', '32187cfc028409b93da0987d67b98a23', 'wilmarcardenas@gmail.com', 'e');
INSERT INTO usuario VALUES ('32308b11b2', '17823657ubv', '32308b11b29be4c0a153c5b9eb7f36fd', 'jdaniel_@hotmail.es', 'e');
INSERT INTO usuario VALUES ('3263a208ba', '25252208ubv', '3263a208ba3451f59add296946313adf', 'suriel_yessika@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3290bf5cbc', '3714321ubv', '3290bf5cbc4345279928fdeba63904a7', 'milagrosfigueredi@gmail.com', 'e');
INSERT INTO usuario VALUES ('3520831582', '13893485ubv', '3520831582a3f09eab46b0642a32e8f3', 'milenamat@gmail.com', 'e');
INSERT INTO usuario VALUES ('35983234e2', '10542923ubv', '35983234e2f832d0806aa91de829f048', 'ineska69@gmail.com', 'e');
INSERT INTO usuario VALUES ('36c9314d15', '15518458ubv', '36c9314d15d82d249d00898eb75b5165', 'yarubin@gmail.com', 'e');
INSERT INTO usuario VALUES ('377b58352f', '24636446ubv', '377b58352f9c4f995a62862297463de3', 'gabaraque@gmail.com', 'e');
INSERT INTO usuario VALUES ('38a32a45c1', '22671765ubv', '38a32a45c1c4361808462272f9d7e14d', 'aquino2pm@hotmail.com', 'e');
INSERT INTO usuario VALUES ('38cd8416e3', '1277003ubv', '38cd8416e36382f769a2c1822ec95cad', 'glsuarez@cantv.net', 'e');
INSERT INTO usuario VALUES ('39d800e020', '20676451ubv', '39d800e02099927552f06586b3fdffe0', 'mr.blsr@gmail.com', 'e');
INSERT INTO usuario VALUES ('3a5ace4806', '6452323ubv', '3a5ace4806d315e0354779a560ee4a69', 'chichi2301@hotmail.es', 'e');
INSERT INTO usuario VALUES ('3aeeb00a75', '20490254ubv', '3aeeb00a7597ef37ee34fe917d43bd08', 'erick_R_20@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3af90f4ac0', '19162428ubv', '3af90f4ac016b052a00e97e28a0cce49', 'marcoandroide@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3b1ffb755e', '2518991ubv', '3b1ffb755ec345453d1fe83cf36900b6', 'yolanda915@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3b701b0c98', '24271884ubv', '3b701b0c987fd061f4fb8df415424883', 'alexatita66@gmail.com', 'e');
INSERT INTO usuario VALUES ('3bbe131f45', '21724030ubv', '3bbe131f4558c8301504c6c8df1759ed', 'dnyl0813@gmail.com', 'e');
INSERT INTO usuario VALUES ('3c223cc0fb', '27496133ubv', '3c223cc0fbaa8da6f04739a9e656dd47', 'vladimirviper84@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3c48247613', '10578660ubv', '3c48247613dcbdbc3e3b648f68d1fdf0', 'ibismejias@gmail.com', 'e');
INSERT INTO usuario VALUES ('3c8c644b1b', '84487034ubv', '3c8c644b1bf7053e232d8406e34e3e37', 'magatela@yahoo.com', 'e');
INSERT INTO usuario VALUES ('3cb5485b1c', '17576864ubv', '3cb5485b1ce7f9609ecbe5e3c06bb76d', 'angie.romero86@gmail.com', 'e');
INSERT INTO usuario VALUES ('3cf22be9ee', '18932853ubv', '3cf22be9eeff52b50cc5a0310018407d', 'klinath@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3d06ea9f35', '4754490ubv', '3d06ea9f359a814d3ac44f32869b944a', 'alexiscast@gmail.com', 'e');
INSERT INTO usuario VALUES ('3d22ffa163', '19429046ubv', '3d22ffa163b41a1eb6debadfcb1e445a', 'www.angelikund@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3d96ad349c', '12639807ubv', '3d96ad349c8bab4f3393bdac745fa7c8', 'animaciondigital@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3e02412f43', '21409304ubv', '3e02412f4391782a3724701ce4d57f43', 'anye_ruiz@hiotmail.com', 'e');
INSERT INTO usuario VALUES ('3e5e19e853', '20127441ubv', '3e5e19e853d55ba9b61dd76578f67e0b', 'maikeljdb@hotmail.com', 'e');
INSERT INTO usuario VALUES ('3ed6eb4047', '12292310ubv', '3ed6eb404722f1de1eb7562808a8da03', 'ccarrillo2007@gmail.com', 'e');
INSERT INTO usuario VALUES ('3fd7b7b59c', '16871393ubv', '3fd7b7b59c18fbe52c8c6d46a1e4d757', 'sujeidigomez@hotmail.com', 'e');
INSERT INTO usuario VALUES ('40c0cbd0df', '11990080ubv', '40c0cbd0dfff7a8d49453d74d2b197e6', 'c_elena_leo@hotmail.com', 'e');
INSERT INTO usuario VALUES ('41641d6739', '21374356ubv', '41641d6739c8e33c4e342d5e8be7de0f', 'fuentesebastian@hotmail.com', 'e');
INSERT INTO usuario VALUES ('41af4caf3a', '19371391ubv', '41af4caf3ac92343b8415aacca27053c', 'kirius71@hotmail.com', 'e');
INSERT INTO usuario VALUES ('41cd739cda', '22438056ubv', '41cd739cda1f51cc7efe4c2c01cf9176', 'jorfrancis_07@hotmail.com', 'e');
INSERT INTO usuario VALUES ('42fd382bea', '18104664ubv', '42fd382bea1316db3484bbf68767f6f1', 'velecomexi@gmail.com', 'e');
INSERT INTO usuario VALUES ('4324865dbd', '19573491ubv', '4324865dbd05bd56b0dbfbb01a5d8b3e', 'andrea_lg_171@hotmail.com', 'e');
INSERT INTO usuario VALUES ('434ca79132', '17123389ubv', '434ca791329ab61c2447d1a9905e6623', 'alex_rubio_1983@hotmail.com', 'e');
INSERT INTO usuario VALUES ('43aae6ce82', '19930990ubv', '43aae6ce82f7c9159c666cdf04c42ae4', 'alexandra_gsm@hotmail.com', 'e');
INSERT INTO usuario VALUES ('43e0baefa4', '19212586ubv', '43e0baefa4776d2186190daece092d3e', 'carolinaayos@gmail.com', 'e');
INSERT INTO usuario VALUES ('44806f3f87', '13231533ubv', '44806f3f872cd2ef178c214530872930', 'rebeldeche1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('45d364c867', '19208506ubv', '45d364c86777c7a536eaadbc1dec865e', 'pldg90@gmail.com', 'e');
INSERT INTO usuario VALUES ('45d5d619fb', '17966102ubv', '45d5d619fba7cde19bd28891fd414a4e', 'jmejic@gmail.com', 'e');
INSERT INTO usuario VALUES ('471ed7d958', '15327666ubv', '471ed7d9589216ad9f9849fb949c37d9', 'jofre_y_p@hotmail.com', 'e');
INSERT INTO usuario VALUES ('48772b639e', '21623620ubv', '48772b639e4b7a49dded74b99ba1de52', 'stefany_pena@gmail.com', 'e');
INSERT INTO usuario VALUES ('48c045d54f', '14156292ubv', '48c045d54f83b341c5760f07b5a9cf5d', 'irmadayana@hotmail.com', 'e');
INSERT INTO usuario VALUES ('4928d98c98', '14411318ubv', '4928d98c98f50095144ecb4445e967d1', 'rivero.johanna@gmail.com', 'e');
INSERT INTO usuario VALUES ('49f8402c17', '13614671ubv', '49f8402c17f076b0e50f9853fb6ab515', 'gustavo@hotmail.com', 'e');
INSERT INTO usuario VALUES ('4aedfd92e0', '19614495ubv', '4aedfd92e0847562c1c5e10474bb21f3', 'wilmer.arp@gmail.com', 'e');
INSERT INTO usuario VALUES ('4af71ab81d', '19499135ubv', '4af71ab81d6860fc7d7998c1a9d41ce6', 'sarahermoso2007@gmail.com', 'e');
INSERT INTO usuario VALUES ('4d64d71035', '16663376ubv', '4d64d7103542ba273cf49667bc26721d', 'erika5318@hotmail.com', 'e');
INSERT INTO usuario VALUES ('4dbd487894', '21103279ubv', '4dbd4878943db554ab60dd304ddbb6f1', 'carlostualvarado@gmail.com', 'e');
INSERT INTO usuario VALUES ('4e3d0380e1', '17351287ubv', '4e3d0380e1a9c7be174eec3f157c003e', 'elisabeth841@hotmail.com', 'e');
INSERT INTO usuario VALUES ('4f20dad4f5', '22908892ubv', '4f20dad4f562784b8400f2e52c2c5e17', 'winniferorduz@gmail.com', 'e');
INSERT INTO usuario VALUES ('4fb51c9c34', '24210448ubv', '4fb51c9c3483396d27f023636b1b6783', 'pirateaelplaneta@gmail.com', 'e');
INSERT INTO usuario VALUES ('4fbb159374', '21326882ubv', '4fbb1593744bd7b5d5cf54afe19de87b', 'mamunegrin@gmail.com', 'e');
INSERT INTO usuario VALUES ('50de41b331', '16562562ubv', '50de41b331fbb882dc8ec1bfc85d66b4', 'danitzaturmero@gmail.com', 'e');
INSERT INTO usuario VALUES ('50e04f8049', '6928842ubv', '50e04f8049ab11817496b11aa4628125', 'mariateresavidal251@hotmail.com', 'e');
INSERT INTO usuario VALUES ('51155427b6', '13749723ubv', '51155427b6702da7b4c68be768d1fe97', 'filsofia@hotmail.com', 'e');
INSERT INTO usuario VALUES ('51750860da', '25213661ubv', '51750860dab0e8add1c4fcfda409b4b8', 'joantonio_48@hotmail.com', 'e');
INSERT INTO usuario VALUES ('518d87db74', '13171743ubv', '518d87db74d7046f86dddefdd46e7182', 'elseruniversal@gmail.com', 'e');
INSERT INTO usuario VALUES ('52b4143d22', '17075089ubv', '52b4143d2264fbb70a847512b186cf30', 'gabrielaabreuucv@yahoo.com', 'e');
INSERT INTO usuario VALUES ('53c25df466', '16923540ubv', '53c25df466e130654cc36a636b44dc3c', 'hrpo.17@gmail.com', 'e');
INSERT INTO usuario VALUES ('5455dd71c9', '20596697ubv', '5455dd71c9287cde644a8eb146d613f3', 'beatrizrodriguezb1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('54a39bed4f', '7566883ubv', '54a39bed4f7e0c23c30c7d891a6d73d4', 'analorenzo63@cantv.net', 'e');
INSERT INTO usuario VALUES ('54c20b79ec', '16555999ubv', '54c20b79ec7c0071b74c6191dffe92b0', 'libanez_ve@hotmai.com', 'e');
INSERT INTO usuario VALUES ('55e933cc1b', '16970555ubv', '55e933cc1b4555d9cf70ec5bdfd5c99a', 'anthonyjacqueperezvilla@gmail.com', 'e');
INSERT INTO usuario VALUES ('563c93d3c6', '5430120ubv', '563c93d3c6319af3d35ff60943726ea2', 'gladmart@gmail.com', 'e');
INSERT INTO usuario VALUES ('595e401476', '15614763ubv', '595e401476b192635749b42771961f69', 'esmeraldaalvire@gmail.com', 'e');
INSERT INTO usuario VALUES ('5981e6fe9f', '19852826ubv', '5981e6fe9f46d08cf3f2bd55d838bba8', 'ambiet14@gmail.com', 'e');
INSERT INTO usuario VALUES ('59f65587bc', '23652827ubv', '59f65587bc1e8e47e27b7cdee24f1ab7', 'reynaaguilera_17@hotmail.com', 'e');
INSERT INTO usuario VALUES ('5ae6dc1980', '18745220ubv', '5ae6dc1980c5044dcb8a87b3442011c0', 'yennifercalderon7@hotmail.com', 'e');
INSERT INTO usuario VALUES ('5ba11776ba', '12392964ubv', '5ba11776bad8758f15550bcc1d36b398', 'noeliagemelas@gmail.com', 'e');
INSERT INTO usuario VALUES ('5daea9bc68', '20799233ubv', '5daea9bc687e5726b26f02c9460e5298', 'yenift_ucv@hotmail.com', 'e');
INSERT INTO usuario VALUES ('5ec13af607', '19199979ubv', '5ec13af60767fd0f7bd72ed41d9e9d11', 'zullyoliveira@hotmail.com', 'e');
INSERT INTO usuario VALUES ('60f352f810', '20870063ubv', '60f352f810b4dfc138f44f20134af87a', 'laurabbm2091@gmail.com', 'e');
INSERT INTO usuario VALUES ('6287cf39c7', '23918853ubv', '6287cf39c73a8ca8b58157f3be5c7c1d', 'wc1_17@hotmail.com', 'e');
INSERT INTO usuario VALUES ('62a28619ee', '17803163ubv', '62a28619ee9d607fc276c3cb6783ee67', 'omarbaz@gmail.com', 'e');
INSERT INTO usuario VALUES ('6347ef37c4', '1743567ubv', '6347ef37c4ffdf131a8fadc0d1605a83', 'flaviaespinoza2012@hotmai.com', 'e');
INSERT INTO usuario VALUES ('635e7aefdc', '3807699ubv', '635e7aefdc1372fcc6d873d7b79c0fa6', 'gean_maria@hotmail.com', 'e');
INSERT INTO usuario VALUES ('63e80728f6', '25211287ubv', '63e80728f67538324cabc6295502f155', 'gatj_1996@hotmail.com', 'e');
INSERT INTO usuario VALUES ('644acabfe8', '19820399ubv', '644acabfe88ee5317893eaad569ee187', 'ramsiul_2010@hotmail.com', 'e');
INSERT INTO usuario VALUES ('6500688b19', '23616375ubv', '6500688b195513cb465ce0dcf3eb37d7', 'rock_17_pink@hotmail.com', 'e');
INSERT INTO usuario VALUES ('6513c0a743', '19507237ubv', '6513c0a743ece3872f912713fb29b17f', 'jeanclaude_815@hotmail.com', 'e');
INSERT INTO usuario VALUES ('6532f9bee0', '24883532ubv', '6532f9bee0779cdb79f11f48a223ae97', 'lanemisik@hotmail.com', 'e');
INSERT INTO usuario VALUES ('65c970ff72', '6563726ubv', '65c970ff72ef5a10cbad0abdf562bbf2', 'reyesemilio5@hotmail.com', 'e');
INSERT INTO usuario VALUES ('66d767af9a', '20976794ubv', '66d767af9a7a176ddd079813dd5fcfb1', 'ellysj.h.z@gmail.com', 'e');
INSERT INTO usuario VALUES ('66f0818864', '12687712ubv', '66f0818864dee2281a4dc4e7eae406e9', 'gabyalexan@yahoo.es', 'e');
INSERT INTO usuario VALUES ('679f68c520', '22796426ubv', '679f68c520f4b5b27433a1649749e669', 'girl_emo2@hotmail.com', 'e');
INSERT INTO usuario VALUES ('684c7c3f69', '5145150ubv', '684c7c3f692c19536626ff83dff802a8', 'luzsaraka@hotmail.com', 'e');
INSERT INTO usuario VALUES ('69b977022b', '16562288ubv', '69b977022b09da2af38947b802b7df98', 'alfredofunglai@hotmail.com', 'e');
INSERT INTO usuario VALUES ('69f6d6d03b', '21405827ubv', '69f6d6d03bdaccf42e3d841a9ec3985d', 'albacimma@hotmail.com', 'e');
INSERT INTO usuario VALUES ('6a7c4004ad', '22035020ubv', '6a7c4004adbfe2bd20c6ab92a8b4f364', 'josmesery@hotmail.com', 'e');
INSERT INTO usuario VALUES ('6ad288adea', '10690807ubv', '6ad288adea6ae7db2de58eafb10a37ff', 'jerany69@gmail.com', 'e');
INSERT INTO usuario VALUES ('6ae19ca142', '20675303ubv', '6ae19ca1423930dd5e685ba7d1d206eb', 'davidnino91@gmail.com', 'e');
INSERT INTO usuario VALUES ('6b13b73ddb', '19650399ubv', '6b13b73ddb6c2ddc80f924f73f5cfc1e', 'librepensadoruniversal@gmail.com', 'e');
INSERT INTO usuario VALUES ('6b397e1a28', '63212336ubv', '6b397e1a285daa7c035c0a0941398adb', 'yurialberti@gmail.com', 'e');
INSERT INTO usuario VALUES ('6d7b2f5347', '23802965ubv', '6d7b2f5347c05d9d9bbb550cb6a52e0d', 'oswaldo0494@hotmail.com', 'e');
INSERT INTO usuario VALUES ('6daf995fde', '82154134ubv', '6daf995fdecc0383ba23dee1a5937910', 'alchinojdd@hotmail.com', 'e');
INSERT INTO usuario VALUES ('6dc3e818a3', '22558172ubv', '6dc3e818a318185616239c4645ed8aa3', 'angelavillareal89@gmail.com', 'e');
INSERT INTO usuario VALUES ('6de206eb21', '13459096ubv', '6de206eb2165b5a5af01f4140d0cd270', 'jurbaneja22@gmail.com', 'e');
INSERT INTO usuario VALUES ('6df11dbffb', '6017573ubv', '6df11dbffb49deba1343a758c98c822a', 'jaki62a@gmail.com', 'e');
INSERT INTO usuario VALUES ('6df85bb779', '18809028ubv', '6df85bb77980f597e0fbd4b3483481b4', 'eulynelhernandez1@gmail.com', 'e');
INSERT INTO usuario VALUES ('6e62097539', '4850461ubv', '6e62097539557bc011f8c973d38d4cf4', 'diegovillegas@cantv.net', 'e');
INSERT INTO usuario VALUES ('6f24230a8e', '16301238ubv', '6f24230a8ef717b16d37d7f3535bd623', 'gsolorzanos@gmail.com', 'e');
INSERT INTO usuario VALUES ('706032ad11', '22020098ubv', '706032ad1186f68b1ded826ddc048a01', 'jesab.04@gmail.com', 'e');
INSERT INTO usuario VALUES ('70c237bb7b', '20753420ubv', '70c237bb7bbcdfaedde91536e759bb9a', 'vanecolinal@gmail.com', 'e');
INSERT INTO usuario VALUES ('70f4079824', '6443291ubv', '70f40798247cd09260297c7c69e1c33e', 'isacoral66@hotmail.com', 'e');
INSERT INTO usuario VALUES ('71ed8ccf8d', '12410521ubv', '71ed8ccf8d656aeea45a4a75aaf89402', 'zulayaltamira@hotmail.com', 'e');
INSERT INTO usuario VALUES ('71f249b649', '15217394ubv', '71f249b649a5570587db802cb68ba864', 'velasquez.oscar@gmail.com', 'e');
INSERT INTO usuario VALUES ('7213f6e62f', '21424245ubv', '7213f6e62f578a30de517af46b1eea26', 'africa.blanco@gmail.com', 'e');
INSERT INTO usuario VALUES ('72fc1073a0', '62031233ubv', '72fc1073a0f6cf1cc53a30fce9f33c42', 'aleida_1601@hotmail.com', 'e');
INSERT INTO usuario VALUES ('73034dfbcd', '17562116ubv', '73034dfbcd376a99580504ba4d718e93', 'jrovariov@gmail.com', 'e');
INSERT INTO usuario VALUES ('73379fed5f', '17802853ubv', '73379fed5faa1e1ccdabdae678ec07f7', 'kbristuta@hotmail.com', 'e');
INSERT INTO usuario VALUES ('738baef4b7', '10236689ubv', '738baef4b740803e8c4cf9bf135fb216', 'nolatiens@hotmail.com', 'e');
INSERT INTO usuario VALUES ('73df77cae9', '20209588ubv', '73df77cae941c086a1707647e688956f', 'luisy_007@hotmail.com', 'e');
INSERT INTO usuario VALUES ('740be70003', '6446241ubv', '740be700031bf638ded07b4ed165330f', 'yasalve715@msn.com', 'e');
INSERT INTO usuario VALUES ('74851df88b', '18364383ubv', '74851df88ba531f6c1e4fed5e4d52217', 'yuzam1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7529b17420', '6244210ubv', '7529b17420bad87b3d33a88bebfc5f35', 'arredondos17@yahoo.es', 'e');
INSERT INTO usuario VALUES ('76eb948225', '13904532ubv', '76eb948225d601ffd05dcd054440796e', 'amgmili@hotmail.com', 'e');
INSERT INTO usuario VALUES ('771b2c2160', '3790071ubv', '771b2c2160d700e5b3002e119f3f0cee', 'latorre103@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7852bb1915', '21133081ubv', '7852bb1915c3520a81f16482d730fbd5', 'jhona_melean@hotmail.com', 'e');
INSERT INTO usuario VALUES ('793f15f20e', '18039468ubv', '793f15f20e67fa3b5b2232e33cb8ce96', 'jeffersonjhavierlugo@gmail.com', 'e');
INSERT INTO usuario VALUES ('7948d9b82f', '19966085ubv', '7948d9b82f38fbf790aa76cb1d655eec', 'lgka19@gmail.com', 'e');
INSERT INTO usuario VALUES ('79ab4cb18d', '18364537ubv', '79ab4cb18dd6d4eaf9574ded553247c7', 'jeancarlos294@hotmail.com', 'e');
INSERT INTO usuario VALUES ('79c50b197c', '17754294ubv', '79c50b197c554c81348192d6ae0d23a0', 'sanabria.juancho@gmail.com', 'e');
INSERT INTO usuario VALUES ('79ca9c3244', '22048561ubv', '79ca9c3244c9f97cd4bf4bdb17cf1cfa', 'samantaortegap@gmail.com', 'e');
INSERT INTO usuario VALUES ('7a58d48253', '24277687ubv', '7a58d482539bd8fccb8d8c9063b158b5', 'anyely_0027@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7a939c089e', '20826589ubv', '7a939c089ed08aa38746e70e94c70dc7', 'cinthyayac@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7b988a2384', '22359190ubv', '7b988a238440dcbb386c4006998b39ad', 'gracielaclemente7@gmail.com', 'e');
INSERT INTO usuario VALUES ('7ba16cbc40', '25735809ubv', '7ba16cbc4004e64f52112366825f9e5a', 'yoselin_crs@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7be7763766', '14518496ubv', '7be776376671f609c29a57509afb4f92', 'aaaaaa@aaaa.com', 'e');
INSERT INTO usuario VALUES ('7bf3aef833', '16148337ubv', '7bf3aef833100bdfc7fb5e990c6bb57f', 'jeycast@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7c492bd927', '16179721ubv', '7c492bd9278191a4a2cef74f08d5eafe', 'jesustineot@gmail.com', 'e');
INSERT INTO usuario VALUES ('7c742f80c8', '23806810ubv', '7c742f80c838053273a1ddb23f92e5a5', 'anny09_20@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7cb8f47f8c', '22618251ubv', '7cb8f47f8cdb7e5e3ad823f96e208f03', 'danielacarrascal@gmail.com', 'e');
INSERT INTO usuario VALUES ('7cbbab05f7', '6144090ubv', '7cbbab05f72d21551b207b3806d23dcb', 'ayexaveroni@gmail.com', 'e');
INSERT INTO usuario VALUES ('7cd3fa1630', '24309002ubv', '7cd3fa163081e8eb95640c4ac3a1402b', 'jocsanucv@gmail.com', 'e');
INSERT INTO usuario VALUES ('7cf2b04096', '17153934ubv', '7cf2b040964204c1694252f116c3caae', 'ysbeto1018@gmail.com', 'e');
INSERT INTO usuario VALUES ('7d0378fa14', '19753874ubv', '7d0378fa145c550a203e43832aa6936e', 'aurangelyn.mata@gmail.com', 'e');
INSERT INTO usuario VALUES ('7dc79524c6', '25229695ubv', '7dc79524c648f19a3df3ac92a2dbdcce', 'heilingabriela@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7e045721c3', '28141100ubv', '7e045721c3bd8eea8468e11707dfca68', 'leymonmar@hotmail.com', 'e');
INSERT INTO usuario VALUES ('7fd7607662', '6217262ubv', '7fd7607662190e1b51eaf6b1d4914241', 'leninl2009@yuahoo.com', 'e');
INSERT INTO usuario VALUES ('80e77ecfae', '21117918ubv', '80e77ecfaedbf29293ffc35fe17278cf', 'pazfernando93@hotmail.com', 'e');
INSERT INTO usuario VALUES ('81a55ada59', '5614290ubv', '81a55ada597f357ba3d144cc8f365ca8', 'mairojas16@gmail.com', 'e');
INSERT INTO usuario VALUES ('8222644c10', '11937465ubv', '8222644c1001aefdb304d1e70609a2c0', 'prof.bettysanchez@gmail.com', 'e');
INSERT INTO usuario VALUES ('8244aa860e', '23610554ubv', '8244aa860ea9c6f6113fd87606c27564', 'alexanderalvarezv@hotmail.com', 'e');
INSERT INTO usuario VALUES ('832b7fd7f8', '24758212ubv', '832b7fd7f86e589750e24c7af283565c', 'comado0@gmail.com', 'e');
INSERT INTO usuario VALUES ('838076259b', '19564542ubv', '838076259bfe647c31170bd95c6c2aa9', 'jessicajch@hotmail.com', 'e');
INSERT INTO usuario VALUES ('84fe385558', '19932410ubv', '84fe385558079e38b38f925f1e6b21c7', 'daryet_27@hotmail.com', 'e');
INSERT INTO usuario VALUES ('852e185551', '19378202ubv', '852e1855516f9fb4bb7af922cf06059b', 'pezziag@hotmail.com', 'e');
INSERT INTO usuario VALUES ('85b815760d', '18388780ubv', '85b815760d1376a044fbde523b2a5a89', 'keilaescobar@gmail.com', 'e');
INSERT INTO usuario VALUES ('860820b317', '12410017ubv', '860820b31759db275f0bb93fcfa03fcf', 'gerlys@hotmail.com', 'e');
INSERT INTO usuario VALUES ('871aaeb983', '12395446ubv', '871aaeb98377c2f6dee2603de0f6d1cd', 'lisdelpi@hotmail.com', 'e');
INSERT INTO usuario VALUES ('87b5bdf141', '13832649ubv', '87b5bdf1418c8c03021a48deb5e35f70', 'jennifersemprunp@yahoo.com', 'e');
INSERT INTO usuario VALUES ('89166e28d0', '19292438ubv', '89166e28d05cd4c9ece1a503ff72af52', 'wconz@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8917ac591c', '21389798ubv', '8917ac591ca20fcfac98c9d0f40f4e37', 'angelaguiar_621@hotmail.com', 'e');
INSERT INTO usuario VALUES ('894b4054c4', '6101538ubv', '894b4054c4095ed574450e241a6063dc', 'oanchofrancisco01@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8956ffa25c', '11225874ubv', '8956ffa25cc931be68ec2d70df9a32c3', 'celandia2702@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8b08697f33', '16937994ubv', '8b08697f33176e9749d22e00d1ae34de', 'omarmejias@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8b77857abb', '19511927ubv', '8b77857abb61768b42b003b0fda20c84', 'cotney1990@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8bf38cdd52', '20614037ubv', '8bf38cdd526ef97ec2a88619bc11d859', 'reyalejandro_93@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8c04e70f46', '20362454ubv', '8c04e70f46ac133a1ac5eb148c1e8d57', 'daniel_x666@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8cfb1ba48c', '24477883ubv', '8cfb1ba48c2e5ac932a734691167b010', 'fortesskp@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8d0ea53684', '23611674ubv', '8d0ea536848562ba2be183a2412259f5', 'neiro2004@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8d9192c741', '19672699ubv', '8d9192c7410b4c73ba3fac9f218b96b8', 'juliocesar193@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8ddd28be92', '12954957ubv', '8ddd28be9248e8c9b283ad19d8d01924', 'nobregamarlene@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8de9965f79', '20911395ubv', '8de9965f7990257c806a89a9704d0473', 'ruben.2079@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8e02f77a59', '84575421ubv', '8e02f77a59edf0ad13098bead0e36af2', 'iratxe12_16@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8e1d687979', '7368255ubv', '8e1d687979fce87cb41fe1f8b1f8f0e0', 'alceo2762@gmail.com', 'e');
INSERT INTO usuario VALUES ('8e4613f013', '16900623ubv', '8e4613f0130c837df1282dfe404f6a4a', 'mariagaby23@gmail.com', 'e');
INSERT INTO usuario VALUES ('8ef4748043', '23574166ubv', '8ef474804346f20cc28dfdca45db723a', 'leoberllyys@gmail.com', 'e');
INSERT INTO usuario VALUES ('8f7494703c', '21070849ubv', '8f7494703ccb76cd869a777b632c6fc9', 'eymimimi@gmail.com', 'e');
INSERT INTO usuario VALUES ('8fb39cfbd4', '6094223ubv', '8fb39cfbd479450d752cfc2f800f8fe9', 'glorialopez29@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8fee5bde3e', '3176091ubv', '8fee5bde3e0c94de0305ca24f1d441a5', 'salome01@cantv.net', 'e');
INSERT INTO usuario VALUES ('900a8efa62', '25386830ubv', '900a8efa62984b52a902d7eacbdb52ef', 'elianareinoso@hotmail.com', 'e');
INSERT INTO usuario VALUES ('902b26300b', '5593906ubv', '902b26300bc892d179ea3bf646dc00a2', 'judithherrada@yahoo.es', 'e');
INSERT INTO usuario VALUES ('90441ae17f', '20975351ubv', '90441ae17fbeb610a731149b3f59851b', 'joelgalipan@hotmail.com', 'e');
INSERT INTO usuario VALUES ('90b005a3c1', '18841566ubv', '90b005a3c1c43cdd5a239b0632e24344', 'sushe_morroe@hotmail.com', 'e');
INSERT INTO usuario VALUES ('90ddb525fa', '23943152ubv', '90ddb525fa6f230c6d53a274c2b69d69', 'lngm1992@gmail.com', 'e');
INSERT INTO usuario VALUES ('91b13642c8', '15615322ubv', '91b13642c83c264905e559c2f0629f40', 'jackecastrom@hotmail.com', 'e');
INSERT INTO usuario VALUES ('93163bccc7', '19015153ubv', '93163bccc7b2f44b2219e7fe4fcb4451', 'catiron16@hotmail.com', 'e');
INSERT INTO usuario VALUES ('8', '8', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('9', '9', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('9375197227', '21409561ubv', '9375197227da703dcd2433a48baefb59', 'sari.link@gmail.com', 'e');
INSERT INTO usuario VALUES ('940ff6c3c0', '2608134ubv', '940ff6c3c0349e909efb62df5781f353', 'rosalina_75@hotmail.com', 'e');
INSERT INTO usuario VALUES ('942946d527', '14954084ubv', '942946d527acbb8fc9782095843dcabb', 'orrd1707@gmail.com', 'e');
INSERT INTO usuario VALUES ('952bd16895', '20675661ubv', '952bd16895c5a96e1a5c2205cbf11a2c', 'oriantho_1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('9530baa3e7', '17983622ubv', '9530baa3e753a62d421350575c957c98', 'mcarofa@hotmail.com', 'e');
INSERT INTO usuario VALUES ('9581b23d22', '498805ubv', '9581b23d22f95d51c2bdc46f2ae26649', 'abc@de.com', 'e');
INSERT INTO usuario VALUES ('96fcb69e2b', '16086444ubv', '96fcb69e2bdb427eaf019055e04b4a60', 'medim03@gmail.com', 'e');
INSERT INTO usuario VALUES ('9833645ff8', '6190018ubv', '9833645ff8e38bb459755782771fc5fa', 'antoniojcirelli@hotmail.com', 'e');
INSERT INTO usuario VALUES ('9860e589ac', '20190516ubv', '9860e589acda6119bc5b4c1694aea65b', 'danoclaveli@gmail.com', 'e');
INSERT INTO usuario VALUES ('98f4c92cb5', '9405243ubv', '98f4c92cb54f0ee2dff24db23ed8dfb8', 'jondiehz@hotmail.com', 'e');
INSERT INTO usuario VALUES ('993485b268', '23615626ubv', '993485b26861ce6e11c282705559e915', 'sarahicolmenares@gmail.com', 'e');
INSERT INTO usuario VALUES ('99b3a25c7a', '24440415ubv', '99b3a25c7a03a7349e5d225d5b8a4412', 'mariecolover94@hotmail.com', 'e');
INSERT INTO usuario VALUES ('9a0e081311', '20493145ubv', '9a0e08131149d2e11f955ae32ca2e4a1', 'engelisserivero@gmail.com', 'e');
INSERT INTO usuario VALUES ('9a18b4c2e0', '19294427ubv', '9a18b4c2e0c2d898f30725d2eb9c9968', 'yiye.art.freaa@gmail.com', 'e');
INSERT INTO usuario VALUES ('9baad9b712', '3400410ubv', '9baad9b7127504bd6ebbaf5e9f1b1e69', 'marisela2212@yahoo.es', 'e');
INSERT INTO usuario VALUES ('9bbbdf0976', '19195164ubv', '9bbbdf0976576a9ca9c25de5de42a87c', 'ernestobetan@gamil.com', 'e');
INSERT INTO usuario VALUES ('9bbd480887', '20291286ubv', '9bbd4808873cec55f8f34d5e1bc30e28', 'carlamora90_4@hotmail.com', 'e');
INSERT INTO usuario VALUES ('9eaffc5950', '23690132ubv', '9eaffc59503d8156127ecea7d24839e9', 'arianna.urrieta@hotmail.es', 'e');
INSERT INTO usuario VALUES ('9f0f010bbc', '18004816ubv', '9f0f010bbc1d39ef945f961dfc2349e5', 'davidantiheroe@gmail.com', 'e');
INSERT INTO usuario VALUES ('9f234ef41b', '19148540ubv', '9f234ef41bd66c3e3ddbe1b571f9bed6', 'datica78@hotmail.com', 'e');
INSERT INTO usuario VALUES ('9f50e495aa', '20307169ubv', '9f50e495aa7ebde82581a65d29ac4f10', 'kriegrs@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a052ff5d64', '19754615ubv', 'a052ff5d64eb79a523531ca2fbbb046f', 'pool.uombat@gmail.com', 'e');
INSERT INTO usuario VALUES ('a0735f4466', '15161930ubv', 'a0735f44662218f5e244d788abb6f374', 'luzmarina_ratia@yahoo.es', 'e');
INSERT INTO usuario VALUES ('a152452093', '82296765ubv', 'a152452093181dae702ea724766b6b53', 'mariachiaragaudioso@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a18935b523', '18223977ubv', 'a18935b5239a5cde909e162cc5be90e6', 'kassen977@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a1f8d7b467', '24655639ubv', 'a1f8d7b4676f781d17ad862d3fefc7d5', 'bsuzza@gmail.com', 'e');
INSERT INTO usuario VALUES ('a3fa404793', '6208396ubv', 'a3fa404793dc9c4f8387df6d0f533beb', 'ralyd.maldonado@gmail.com', 'e');
INSERT INTO usuario VALUES ('a3ff8dce77', '6136474ubv', 'a3ff8dce7798757e7a789ad297c7397f', 'judithrpv@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a4771e09a8', '2990891ubv', 'a4771e09a85b4a9e272677ee97ff2944', 'jchirinosmeneses@gmail.com', 'e');
INSERT INTO usuario VALUES ('a566e55881', '19531282ubv', 'a566e5588124e359ce1d9a335db25e08', 'andreahernandezmotamayor@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a5c3c8d4fc', '15327668ubv', 'a5c3c8d4fcdf4b3127584860737743d9', 'marzia.rada@gmail.com', 'e');
INSERT INTO usuario VALUES ('a5f91574bd', '24335316ubv', 'a5f91574bd90ab758a8196c1a8135722', 'yessifuentes2013@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a6ad1819a9', '13459689ubv', 'a6ad1819a92db8abf1409310f8580d43', 'yelitzadiran@gmail.com', 'e');
INSERT INTO usuario VALUES ('a6ad506249', '23850172ubv', 'a6ad506249cc64b9df1d7e406cb17b82', 'yair.22@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a84bf84716', '21706956ubv', 'a84bf84716c400da8e63b62f0f3d2d36', 'fabianita14@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a8592fe094', '20127400ubv', 'a8592fe094635a02e7ad4234498f3a94', 'freddysantaella_12@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a8bc3613f1', '14784614ubv', 'a8bc3613f1f3c93ece0d618a55d57811', 'yumeycarolina1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('a8f6c51af8', '24940048ubv', 'a8f6c51af82ac72a5d48fa06df438db1', 'jeancqf@gmail.com', 'e');
INSERT INTO usuario VALUES ('a96974a9f0', '19710582ubv', 'a96974a9f01445c2b3625d6ce403e8f0', 'itxel_spc@hotmail.com', 'e');
INSERT INTO usuario VALUES ('aa253b3891', '19561302ubv', 'aa253b3891b2c2e110842e3ce7b02cb8', 'govindavillalobos@hotmail.com', 'e');
INSERT INTO usuario VALUES ('aa48596971', '15804302ubv', 'aa485969713a62691ed0ac5975851b2b', 'rodriguemm@gmail.com', 'e');
INSERT INTO usuario VALUES ('acd9836a1e', '19965464ubv', 'acd9836a1ee929aecfa75efbf39821b3', 'josirivas@hotmail.com', 'e');
INSERT INTO usuario VALUES ('ad05106de8', '19378752ubv', 'ad05106de88fbcd6b6774fc4605bc831', 'maria_36_2@hotmail.com', 'e');
INSERT INTO usuario VALUES ('ad73c89a66', '12575455ubv', 'ad73c89a669bbfd3b24416ad78c77253', 'arevalo_rosa09@yahoo.es', 'e');
INSERT INTO usuario VALUES ('ae138a6319', '82211217ubv', 'ae138a63191c47d091ec7ab903ab2745', 'aleth.adriana@gmail.com', 'e');
INSERT INTO usuario VALUES ('aed56d67c7', '19642773ubv', 'aed56d67c75151af2a270ffeae259783', 'estevesnau@gmail.com', 'e');
INSERT INTO usuario VALUES ('aedf7c97fa', '4253850ubv', 'aedf7c97fac9bea4c9ff6769379ea852', 'jesusrn13123@hotmail.com', 'e');
INSERT INTO usuario VALUES ('af88cca3a6', '12955762ubv', 'af88cca3a638d3855ee7f5b0549bcb4f', 'alraroiz@hotmail.com', 'e');
INSERT INTO usuario VALUES ('aff5404098', '20095455ubv', 'aff540409846818fa2527270bf9fe770', 'hensay5@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b0d57cd123', '16430446ubv', 'b0d57cd123388082bbf69189ece9ade0', 'cecilipisi7@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b18e896166', '25367842ubv', 'b18e8961665ae5f1ad05c1fb9bc48750', 'emilysalazar1412@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b215fb97cb', '18641635ubv', 'b215fb97cb007e0f22e10da9171874c7', 'nelson_david7@yahoo.es', 'e');
INSERT INTO usuario VALUES ('b22034d8d4', '6101812ubv', 'b22034d8d4e312e5b95e9adcd00da6fc', 'ebl828@gmail.com', 'e');
INSERT INTO usuario VALUES ('b22b7c89dd', '5425601ubv', 'b22b7c89dd689b076aa81ba79007af53', 'josefinag09@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b2bd015c3a', '22906943ubv', 'b2bd015c3a4ec78b5dc8a998525f6956', 'Adalbern87@gmail.com', 'e');
INSERT INTO usuario VALUES ('b2ecc3e86c', '3959429ubv', 'b2ecc3e86ca144787e543a9ff4e0537a', 'fannyornes@gmail.com', 'e');
INSERT INTO usuario VALUES ('b32ba402f1', '20747366ubv', 'b32ba402f1166fa9abecbccb0dcbb01c', 'carlos_belisar_7@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b344d523bc', '24939913ubv', 'b344d523bc7a1389e16b869302625dab', 'samuel.malave@gmail.com', 'e');
INSERT INTO usuario VALUES ('b37ddee0ff', '24749047ubv', 'b37ddee0ff342c162386f35e4e92837f', 'babalala.16ka@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b3c88e32bc', '19066805ubv', 'b3c88e32bce0f337aff20983e4b9c3cd', 'abrahamsuarez1990@gmail.com', 'e');
INSERT INTO usuario VALUES ('b51e6f2779', '4594745ubv', 'b51e6f2779586454214ebc982ea414d7', 'arl52@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b54968df21', '17932338ubv', 'b54968df21c66ad05004f118bb52cdb3', 'atalaya_86@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b6fb35ea3b', '23690261ubv', 'b6fb35ea3b348df6b17b25e49404fb0b', 'georgelys_lopez@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b6fc57fe8d', '19819715ubv', 'b6fc57fe8dcd4de155f32bc70461425f', 'nakarygarciamaestre@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b82a101ff6', '16544244ubv', 'b82a101ff681323f7c4c10b54fc04275', 'amadeuswetzstein@gmail.com', 'e');
INSERT INTO usuario VALUES ('b890ae3e40', '17158282ubv', 'b890ae3e40953f3fc039bccfe2e4f20d', 'jill_spears@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b895ce27a9', '21016479ubv', 'b895ce27a9afbb515b99de8f66abdcb9', 'madeleinegrimaldi_14@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b8fa23c978', '4349119ubv', 'b8fa23c9781bb94aecfd34f2b0a29335', 'dorischw@msn.com', 'e');
INSERT INTO usuario VALUES ('b9226deefb', '19789602ubv', 'b9226deefbe4466e6dca800e72009125', 'angeles_g18@hotmail.com', 'e');
INSERT INTO usuario VALUES ('b92bc4131f', '24456052ubv', 'b92bc4131f0f89a3405cfcab5f015cb1', 'maceoborrero@hotmail.com', 'e');
INSERT INTO usuario VALUES ('ba0b675412', '17718563ubv', 'ba0b675412da70a7549042792942bb99', 'aparedes02@hotmail.com', 'e');
INSERT INTO usuario VALUES ('baa25f1b12', '25136343ubv', 'baa25f1b12b024a6dfe382d8c06530ce', 'franksolano27@hotmail.com', 'e');
INSERT INTO usuario VALUES ('bacca6feee', '24313246ubv', 'bacca6feeef724b68de7a6d979fa0c32', 'ivanaorduz16@live.com', 'e');
INSERT INTO usuario VALUES ('bb73813413', '6431221ubv', 'bb73813413ddf7c9b1a0c68db274b65f', 'jrgodoy@yahoo.com', 'e');
INSERT INTO usuario VALUES ('bd4f462ed7', '19587512ubv', 'bd4f462ed79fe64255263403aa904cf0', 'elrichani@hotmail.com', 'e');
INSERT INTO usuario VALUES ('be497adaa9', '19711616ubv', 'be497adaa95c74baedd04b31b06949cb', 'yohaglismaestre@hotmail.com', 'e');
INSERT INTO usuario VALUES ('bea3f3ebe8', '4441084ubv', 'bea3f3ebe82c8ace38571ad2b3b06aa7', 'perlacheremozanotty@gmail.com', 'e');
INSERT INTO usuario VALUES ('bf31194947', '19195434ubv', 'bf311949475af345d41c0bfb121b458d', 'barvi.rodriguez@gmail.com', 'e');
INSERT INTO usuario VALUES ('bffda36bb9', '14391985ubv', 'bffda36bb995132005c5c88dc8d6d460', 'alejandro_fei@hotmail.com', 'e');
INSERT INTO usuario VALUES ('c017fa6d67', '6469164ubv', 'c017fa6d671702b0c394a04f49444a8e', 'thaybermudez@hotmail.com', 'e');
INSERT INTO usuario VALUES ('c12fdc0743', '19292435ubv', 'c12fdc07437ad5cec647ee89f97eb2f9', 'shesalt16@hotmail.com', 'e');
INSERT INTO usuario VALUES ('c1cf5380c3', '21283155ubv', 'c1cf5380c3b232f6757f747082d5f4da', 'castillogisel01@gmail.com', 'e');
INSERT INTO usuario VALUES ('c22a9c0cd0', '81072197ubv', 'c22a9c0cd0455fd15859ca11353777cc', 'abc@gmail.com', 'e');
INSERT INTO usuario VALUES ('c2c894ac84', '17563504ubv', 'c2c894ac84fe9a44bf8ec54beda8885a', 'info.batista@gmail.com', 'e');
INSERT INTO usuario VALUES ('c34e779c26', '16284976ubv', 'c34e779c2622bfc3d8d6c4ad6cdc9082', 'alfredo_fum@hotmail.com', 'e');
INSERT INTO usuario VALUES ('c38d0386f6', '16568405ubv', 'c38d0386f622248cdb899e976ca230c2', 'adan.quero@gmail.com', 'e');
INSERT INTO usuario VALUES ('c3cc06edf5', '6275138ubv', 'c3cc06edf57c6315a4a3c6ccffa05a16', 'thaisvidal2@gmail.com', 'e');
INSERT INTO usuario VALUES ('c3f092d7ca', '17343908ubv', 'c3f092d7ca93c88f61fe066cd245b3ac', 'litchestein@hotmail.com', 'e');
INSERT INTO usuario VALUES ('c40ff2008e', '19398177ubv', 'c40ff2008e0f3891df224a64b45ef28d', 'christianjguerrerob@gmail.com', 'e');
INSERT INTO usuario VALUES ('c5188b91e0', '19720670ubv', 'c5188b91e05f9c30ffe11ae8a04fc5d1', 'emilycrq@gmail.com', 'e');
INSERT INTO usuario VALUES ('c621eb3d49', '21323013ubv', 'c621eb3d49ebd7501346522a982946d3', 'breyerrojas@gmail.com', 'e');
INSERT INTO usuario VALUES ('c72c827c13', '23529324ubv', 'c72c827c138343314f24d380fa3d6a11', 'eukris_105@hotmail.com', 'e');
INSERT INTO usuario VALUES ('c7ed25bff4', '15812170ubv', 'c7ed25bff4e584d2b1de36e41be6a659', 'macarenabenitezbatista@hotmail.com', 'e');
INSERT INTO usuario VALUES ('c7eedcf388', '23185323ubv', 'c7eedcf388caccae196712ae70fa11d9', 'keys.sarabia.sarabia@gmail.com', 'e');
INSERT INTO usuario VALUES ('c88eb69356', '25845674ubv', 'c88eb6935651448dcb1d6e526933d05f', 'beatrizrodriguezb1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('c95e144e0a', '24408861ubv', 'c95e144e0a8989307b842b7b69f5eae3', 'criticavenezolana@hotmail.com', 'e');
INSERT INTO usuario VALUES ('ca5e394f6e', '13224255ubv', 'ca5e394f6ec67de09732993a009cf0e1', 'simurdiera921@gmail.com', 'e');
INSERT INTO usuario VALUES ('cb6da0478d', '17148460ubv', 'cb6da0478de5fb86e8c51015536a3d05', 'alessandraantuare@gmail.com', 'e');
INSERT INTO usuario VALUES ('cbb1f2eafc', '21183699ubv', 'cbb1f2eafc704ae0a00ebc44d3db0342', 'annycas.ac@gmail.com', 'e');
INSERT INTO usuario VALUES ('cc2ce54c56', '23194364ubv', 'cc2ce54c566b8edfd2bf2967c71c9dd1', 'nohelluna_15@hotmail.com', 'e');
INSERT INTO usuario VALUES ('cc54d0d442', '19255885ubv', 'cc54d0d442950f5bc587490a72cc9da9', 'sevienda@hotmail.com', 'e');
INSERT INTO usuario VALUES ('cc7a8c5544', '5113055ubv', 'cc7a8c554489c8cd595cda9b1e4fb5a8', 'enriquegmucv@gmail.com', 'e');
INSERT INTO usuario VALUES ('cdbc23d2f1', '24234087ubv', 'cdbc23d2f1d1bc1e000cdfc5dd815a52', 'adrianaron05@hotmail.com', 'e');
INSERT INTO usuario VALUES ('ce6f182dbd', '18001076ubv', 'ce6f182dbde7b50ccf396a3506f410c4', 'geisha_154@hotmail.com', 'e');
INSERT INTO usuario VALUES ('cfeb644921', '18753791ubv', 'cfeb644921ea63886938f9478cd9c5ed', 'melanieondarroa25@gmail.com', 'e');
INSERT INTO usuario VALUES ('d189286451', '3803226ubv', 'd18928645124dc9ee5e1a2f8c3cd857e', 'yvyrojas@gmail.com', 'e');
INSERT INTO usuario VALUES ('d1c4acfb21', '23425475ubv', 'd1c4acfb21e8acd40bb54a7f52123d7c', 'miletraviezo@gmail.com', 'e');
INSERT INTO usuario VALUES ('d1d0001ce4', '20673633ubv', 'd1d0001ce450cf131eaac61423f8b628', 'escudero_veronica_173@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d283e5f459', '4684445ubv', 'd283e5f459346d8ca9da09010e2844f6', 'margaritaonce@gmail.com', 'e');
INSERT INTO usuario VALUES ('d3074aec1a', '17667183ubv', 'd3074aec1a315bf68e2c61d6982d04b5', 'elizabiana@gmail.com', 'e');
INSERT INTO usuario VALUES ('d36c75da75', '6264676ubv', 'd36c75da75f3823498c38811ba230f48', 'lucel25@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d4f06cf1f3', '22974836ubv', 'd4f06cf1f31fc022ad85858cb0131b3a', 'gkiminusg@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d56e7aebd4', '6496568ubv', 'd56e7aebd466bd49fbc8c3c9d1d1a0b8', 'serena22dl@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d5f7390011', '25773523ubv', 'd5f73900118edfb4f255bc370296b52e', 'linda_mary44@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d6793b22ba', '8346353ubv', 'd6793b22ba9a4ef691e9c4882e55a6f2', 'chicorufinovelasquez2@yahoo.com.es', 'e');
INSERT INTO usuario VALUES ('d686a87323', '20756538ubv', 'd686a87323bdaa254d1422f28ff90b90', 'sinaiandreina@gmail.com', 'e');
INSERT INTO usuario VALUES ('d68e572c4e', '23196102ubv', 'd68e572c4ee058e88e7dda21e7160b7f', 'aleimar.martinez@gmail.com', 'e');
INSERT INTO usuario VALUES ('d6db1dba7d', '20827310ubv', 'd6db1dba7d825ea7d4d92292c9aff677', 'vanecarrillo12@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d791bcb48d', '15585363ubv', 'd791bcb48d286ac374c378e407df7ec0', 'salguodex@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d792fa9412', '19581348ubv', 'd792fa941210ed2d60229455bc6c4ad4', 'victor.martinez.guitar.v5@gmail.com', 'e');
INSERT INTO usuario VALUES ('d7b9688721', '25019347ubv', 'd7b9688721f76b464a4ad157fa32e79d', 'storbluedisaac_107@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d7baa5b962', '3625060ubv', 'd7baa5b962de8cd2cb0b6ea3133f9699', 'adecrespo@gmail.com', 'e');
INSERT INTO usuario VALUES ('d7c7c75956', '5421346ubv', 'd7c7c75956e899a08a8b7ffccbb5ceb8', 'charlytosta@cantv.net', 'e');
INSERT INTO usuario VALUES ('d7ffe04795', '22015128ubv', 'd7ffe04795c2ac5b57f1e52ab938cb5e', 'ZORA_G_M_C@HOTMAIL.COM', 'e');
INSERT INTO usuario VALUES ('d8085912fc', '24981765ubv', 'd8085912fc89f2ffb2d9ebef3b994536', 'rosba_24@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d82a86c001', '17793954ubv', 'd82a86c001f60b0466218ac316dbf322', 'shairfernandez@hotmail.com', 'e');
INSERT INTO usuario VALUES ('d88bd082dd', '4419878ubv', 'd88bd082dd18409bdfa5ccb7f16546f3', 'haydee_62@gmail.com', 'e');
INSERT INTO usuario VALUES ('d9a1117648', '14531735ubv', 'd9a11176484a744ac2e5cf10fc4e54b7', 'marfezz76@gmail.com', 'e');
INSERT INTO usuario VALUES ('d9bdf9c37f', '13162465ubv', 'd9bdf9c37fac3262de42d07d10f52bdd', 'panchocroquer@gmail.com', 'e');
INSERT INTO usuario VALUES ('da1a07be9e', '5096173ubv', 'da1a07be9e0812025fe99f6ede950617', 'marvisgil@gmail.com', 'e');
INSERT INTO usuario VALUES ('da79a272bd', '10513731ubv', 'da79a272bd11eb2f36281f3943c3d2a4', 'lailita21@hotmail.com', 'e');
INSERT INTO usuario VALUES ('dadfac026f', '24758965ubv', 'dadfac026f98c54d01a6883c80093463', 'anyoelisv3@hotmail.com', 'e');
INSERT INTO usuario VALUES ('dae3036c04', '13067965ubv', 'dae3036c04b402479b7c87dd2ebbbff9', 'marellysoraya23@gmail.com', 'e');
INSERT INTO usuario VALUES ('db06dda0c4', '25716256ubv', 'db06dda0c41c799ea3060ccfa64eb36d', 'felizzola_1@hotmail.com', 'e');
INSERT INTO usuario VALUES ('dbc89afd7a', '19418205ubv', 'dbc89afd7a19982f5f81d662efedb03c', 'fonsalo@gmail.com', 'e');
INSERT INTO usuario VALUES ('dc95e24313', '20910537ubv', 'dc95e24313ca1cc40931e8b21a08d1b1', 'infinitoberudez@hotmail.com', 'e');
INSERT INTO usuario VALUES ('dcbc2d0300', '17533289ubv', 'dcbc2d030070b1a05984ba9399c59451', 'dayana1016@hotmail.com', 'e');
INSERT INTO usuario VALUES ('dd55c8891d', '17268270ubv', 'dd55c8891d23ac3e711e711a1e9bbea1', 'julio_asv@hotmail.com', 'e');
INSERT INTO usuario VALUES ('dd7c885920', '15366003ubv', 'dd7c885920fd578ff76cee81859e8057', 'lynnefyerena@hotmail.com', 'e');
INSERT INTO usuario VALUES ('dd9238f419', '7998182ubv', 'dd9238f4199100dc89d725bf6864c949', 'isabelyaneth.mayoraagredo154@gmail.com', 'e');
INSERT INTO usuario VALUES ('de9dfbc7ff', '16457756ubv', 'de9dfbc7ff4c6f0dc37290b8d1f09630', 'juen_montero_gn@hotmail.com', 'e');
INSERT INTO usuario VALUES ('defa791173', '22330865ubv', 'defa791173605683c07b36fe39ad3b33', 'rubita_4_@hotmail.com', 'e');
INSERT INTO usuario VALUES ('e0e3dd89e7', '22048767ubv', 'e0e3dd89e7013b2b85c0597e54599ab9', 'everlyn_toti@hotmail.com', 'e');
INSERT INTO usuario VALUES ('e0ee34fe19', '22611049ubv', 'e0ee34fe194e114090609cdd9f307c60', 'marlystar_00@hotmail.com', 'e');
INSERT INTO usuario VALUES ('e115076120', '14756420ubv', 'e115076120ddd26a385f9fbba3718af2', 'ericmarlon@hotmail.com', 'e');
INSERT INTO usuario VALUES ('e1d82a10cb', '22020334ubv', 'e1d82a10cb31bf8971f6ded714a84cfe', 'gres.npd@gmail.com', 'e');
INSERT INTO usuario VALUES ('e20de52bf1', '4834371ubv', 'e20de52bf197f00d75da52669e428127', 'arelis_1957@hotmail.com', 'e');
INSERT INTO usuario VALUES ('e3053292cc', '15616204ubv', 'e3053292cc784d61f5d6ae45c75c9ab7', 'adalisrm25@hotmail.com', 'e');
INSERT INTO usuario VALUES ('e37fbc1e78', '24277968ubv', 'e37fbc1e784dcc5e94072a24108285ce', 'jjesael@gmail.com', 'e');
INSERT INTO usuario VALUES ('e3d8ca4755', '17166021ubv', 'e3d8ca4755b7c60c574bb86f8c83a0f7', 'josephaponte_26@yahoo.es', 'e');
INSERT INTO usuario VALUES ('e443adf99f', '17906399ubv', 'e443adf99f0ceed2d70def7000004e79', 'a2ebratt69@gmail.com', 'e');
INSERT INTO usuario VALUES ('e44f442a5d', '17741716ubv', 'e44f442a5d55af328fe80523ff89d41a', 'deinalisc@gmail.com', 'e');
INSERT INTO usuario VALUES ('e56b374a99', '24758315ubv', 'e56b374a99c076f5c8fca1199ae08eab', 'mariaalejandraramirezv@gmail.com', 'e');
INSERT INTO usuario VALUES ('e5aa008000', '17215171ubv', 'e5aa0080008ee8b8a9ed4c0e5bb3aa81', 'jr200820@yahoo.es', 'e');
INSERT INTO usuario VALUES ('e5df867529', '11448120ubv', 'e5df8675295a84b0f0a8a428dbecaa29', 'josecastellin@gmail.com', 'e');
INSERT INTO usuario VALUES ('e6fa32dacd', '18728132ubv', 'e6fa32dacd36ac3b424826f53d60b845', 'gaegnb.12@hotmail.com', 'e');
INSERT INTO usuario VALUES ('e768971411', '9147984ubv', 'e768971411b4a6a70bad3fa526f951c3', 'jaidee15@gmail.com', 'e');
INSERT INTO usuario VALUES ('e80cc11413', '19733686ubv', 'e80cc1141320e6bd06527fdcee91f42f', 'gguerrero16@gmail.com', 'e');
INSERT INTO usuario VALUES ('e94f4eb6e4', '22567175ubv', 'e94f4eb6e48dfb845f1df64716cdda75', 'johannahtn@hotnmail.com', 'e');
INSERT INTO usuario VALUES ('e957af2847', '21615196ubv', 'e957af2847e7a3aa48885afbf897d074', 'endermora92@hotmail.com', 'e');
INSERT INTO usuario VALUES ('e98c272df3', '22015125ubv', 'e98c272df3273b5739210cb86a2c17c3', 'carolinazamora11@gmail.com', 'e');
INSERT INTO usuario VALUES ('ea8307d173', '6303212ubv', 'ea8307d1737346357038c81b215ee6d5', 'yajairal_503@hotmail.com', 'e');
INSERT INTO usuario VALUES ('eb94c4b41e', '20615886ubv', 'eb94c4b41ecd1b07d6418877c2d80aa1', 'natastor666@gmail.com', 'e');
INSERT INTO usuario VALUES ('ec63db9cca', '18912245ubv', 'ec63db9cca27ce31b1934ccb7a1dc726', 'saravelasquezrobles@gmail.com', 'e');
INSERT INTO usuario VALUES ('ecf071c1e5', '5013371ubv', 'ecf071c1e52bb28deb2993370f57b40a', 'omartrujillos@gmail.com', 'e');
INSERT INTO usuario VALUES ('ecf26e1a42', '21618138ubv', 'ecf26e1a42d0d21f72bba5243520efa6', 'dulcelaura19@gmail.com', 'e');
INSERT INTO usuario VALUES ('ee24d71330', '23682791ubv', 'ee24d7133017ea2ff824865b3aca6750', 'solbey@hotmail.com', 'e');
INSERT INTO usuario VALUES ('ee89170372', '22035431ubv', 'ee89170372dbf55afa66bab3a712092f', 'naiinfante14@gmail.com', 'e');
INSERT INTO usuario VALUES ('efb2b399f6', '19998199ubv', 'efb2b399f65c2dd4a13fc89c11b35051', 'zid686@hotmail.com', 'e');
INSERT INTO usuario VALUES ('efc6d189b3', '84416248ubv', 'efc6d189b375a922806a68e51c94f2cc', 'ximenarx@hotmail.com', 'e');
INSERT INTO usuario VALUES ('f05f3f43c1', '25689120ubv', 'f05f3f43c1a25aa4a90a2a2e971cc6de', 'gledmarkatiuska@hotmail.com', 'e');
INSERT INTO usuario VALUES ('f08bd5c145', '22493565ubv', 'f08bd5c1454fb03d926ba81e993de998', 'elpika8@hotmail.com', 'e');
INSERT INTO usuario VALUES ('f09cf49621', '20794768ubv', 'f09cf49621648cfb4498788a6259718d', 'dpzambrano17@gmail.com', 'e');
INSERT INTO usuario VALUES ('f0c2b3feef', '19736418ubv', 'f0c2b3feef5f714d2bf7c9ee4cc963f9', 'desktop1192@gmail.com', 'e');
INSERT INTO usuario VALUES ('f0d2c5cb74', '23691255ubv', 'f0d2c5cb7453254f65a2b4d7c4480c31', 'gabriel.pm10@hotmail.com', 'e');
INSERT INTO usuario VALUES ('f1cf224493', '19764233ubv', 'f1cf22449399f7597ab747bed4a73c02', 'valeryjs89@hotmail.com', 'e');
INSERT INTO usuario VALUES ('f259b2f54f', '18441611ubv', 'f259b2f54fc8ed311d2d659b02aa22db', 'emiliataveraucv@gmail.com', 'e');
INSERT INTO usuario VALUES ('f436f5e3c4', '84416011ubv', 'f436f5e3c41a0994765be4fa810d518c', 'luis_7_xtreme@hotmail.com', 'e');
INSERT INTO usuario VALUES ('f51c3cb72f', '14351766ubv', 'f51c3cb72f83797a499e8d0a85d9af1a', 'inilauven@gmail.com', 'e');
INSERT INTO usuario VALUES ('f59462ae0f', '18994269ubv', 'f59462ae0ffbd9351dd7fc9e0bf8f9b3', 'rikardodiaz@gmail.com', 'e');
INSERT INTO usuario VALUES ('f625c9f434', '16811940ubv', 'f625c9f4342ea5462de7f75833d59dd4', 'aguilarexposito.apj@gmail.com', 'e');
INSERT INTO usuario VALUES ('f6be5cc1b0', '3231059ubv', 'f6be5cc1b04d7c4e51fd76be17170820', 'emolero_18@hotmail.com', 'e');
INSERT INTO usuario VALUES ('f7f4c12089', '5279754ubv', 'f7f4c12089eb8554905e2ad36cad2c09', 'mr.blsr@gmail.com', 'e');
INSERT INTO usuario VALUES ('f8e58742fc', '6096050ubv', 'f8e58742fcbd0448b75d92620377ede0', 'ljrc43@hotmail.com', 'e');
INSERT INTO usuario VALUES ('f90892a4c3', '16604386ubv', 'f90892a4c3a0e76b85c0c102c408da46', 'jhnc19684@gmail.com', 'e');
INSERT INTO usuario VALUES ('f9189d1fa3', '24222864ubv', 'f9189d1fa3bf6ebd73b392162e3ce8c0', 'sanabria.adalid@gmail.com', 'e');
INSERT INTO usuario VALUES ('fa44461506', '23695632ubv', 'fa444615068b3b9079dd0a3deb31c082', 'anabellucha_92@hotmail.com', 'e');
INSERT INTO usuario VALUES ('fcf194a52e', '16905375ubv', 'fcf194a52eae9f7ba86258332ef4c38b', 'zionlopez@hotmail.com', 'e');
INSERT INTO usuario VALUES ('fd718b398a', '22493587ubv', 'fd718b398a2b83ad9bbd9b925fcbdd6f', 'johana_avila_1994@hotmail.com', 'e');
INSERT INTO usuario VALUES ('fdbf3629d3', '16114139ubv', 'fdbf3629d3e7e64a54119a5d4826e888', 'manuelalejandro83@hotmail.com', 'e');
INSERT INTO usuario VALUES ('fe1e6f95db', '15200857ubv', 'fe1e6f95dbefbebdfc7b1457a2dbf1de', 'berroteranperez@gmail.com', 'e');
INSERT INTO usuario VALUES ('ff5c232747', '18025015ubv', 'ff5c232747efc4ed72b54ce4ac71b712', 'pablokola@gmail.com', 'e');
INSERT INTO usuario VALUES ('ff7edba8a8', '6331894ubv', 'ff7edba8a87c0d2c2a913c6fdf8796f6', 'osirismolina2010@hotmail.com', 'e');
INSERT INTO usuario VALUES ('ff9c6cea8c', '20913481ubv', 'ff9c6cea8c37ecf0f64314b2e8b0a500', 'wilker120@gmail.com', 'e');
INSERT INTO usuario VALUES ('ffb1f07c7b', '10194962ubv', 'ffb1f07c7b55ea6b1c1fb9e1268e229e', 'emily_crq@hotmail.com', 'e');
INSERT INTO usuario VALUES ('ffb5429864', 'admin22563694ubv', '827ccb0eea8a706c4c34a16891f84e7b', 'yoshi.urbina@gmail.com', 'a');
INSERT INTO usuario VALUES ('2', '2', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('3', '3', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('4', '4', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('5', '5', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('6', '6', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');
INSERT INTO usuario VALUES ('7', '7', '827ccb0eea8a706c4c34a16891f84e7b', '', 'p');


--
-- Name: administrador_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY administrador
    ADD CONSTRAINT administrador_pk PRIMARY KEY (cod_administrador);


--
-- Name: egresado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY egresado
    ADD CONSTRAINT egresado_pkey PRIMARY KEY (cod_egresado);


--
-- Name: estudiante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_pkey PRIMARY KEY (cod_estudiante);


--
-- Name: horario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY horario
    ADD CONSTRAINT horario_pk PRIMARY KEY (cod_horario);


--
-- Name: idioma_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY idioma
    ADD CONSTRAINT idioma_pk PRIMARY KEY (cod_idioma);


--
-- Name: inscripcion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_pkey PRIMARY KEY (cod_inscripcion);


--
-- Name: profesor_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_pk PRIMARY KEY (cod_profesor);


--
-- Name: seccion_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY seccion
    ADD CONSTRAINT seccion_pk PRIMARY KEY (cod_seccion);


--
-- Name: usuario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pk PRIMARY KEY (cod_user);


--
-- Name: administrador_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY administrador
    ADD CONSTRAINT administrador_ibfk_1 FOREIGN KEY (cod_user) REFERENCES usuario(cod_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: egresado_cod_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY egresado
    ADD CONSTRAINT egresado_cod_estudiante_fkey FOREIGN KEY (cod_estudiante) REFERENCES estudiante(cod_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estudiante_cod_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estudiante
    ADD CONSTRAINT estudiante_cod_user_fkey FOREIGN KEY (cod_user) REFERENCES usuario(cod_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: horario_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horario
    ADD CONSTRAINT horario_ibfk_1 FOREIGN KEY (cod_seccion) REFERENCES seccion(cod_seccion) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inscripcion_cod_estudiante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_cod_estudiante_fkey FOREIGN KEY (cod_estudiante) REFERENCES estudiante(cod_estudiante) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inscripcion_cod_seccion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inscripcion
    ADD CONSTRAINT inscripcion_cod_seccion_fkey FOREIGN KEY (cod_seccion) REFERENCES seccion(cod_seccion) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: profesor_cod_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY profesor
    ADD CONSTRAINT profesor_cod_user_fkey FOREIGN KEY (cod_user) REFERENCES usuario(cod_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: seccion_ibfk_8; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY seccion
    ADD CONSTRAINT seccion_ibfk_8 FOREIGN KEY (cod_idioma) REFERENCES idioma(cod_idioma);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

