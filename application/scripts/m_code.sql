-- Table: public.m_code

-- DROP TABLE public.m_code;

CREATE TABLE public.m_code
(
  code_no character varying(3) NOT NULL, -- コード#
  code character(255) NOT NULL, -- コード
  sort integer NOT NULL DEFAULT 1,
  remarks character varying(255), -- 備考
  is_valid boolean NOT NULL DEFAULT true,
  code_value character varying(255), -- コード内容
  CONSTRAINT pk_code PRIMARY KEY (code_no, code)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.m_code
  OWNER TO postgres;
COMMENT ON TABLE public.m_code
  IS 'コードマスタ';
COMMENT ON COLUMN public.m_code.code_no IS 'コード#';
COMMENT ON COLUMN public.m_code.code IS 'コード';
COMMENT ON COLUMN public.m_code.remarks IS '備考';
COMMENT ON COLUMN public.m_code.code_value IS 'コード内容';

