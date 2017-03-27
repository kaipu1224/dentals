-- Table: public.m_users

-- DROP TABLE public.m_users;

CREATE TABLE public.m_users
(
  id character varying(10) NOT NULL, -- ユーザID
  name character varying(50) NOT NULL, -- ユーザ名
  password character varying(255) NOT NULL, -- パスワード
  tel_no character varying(12), -- 電話番号
  mobile_no character varying(13), -- 携帯番号
  email character varying(255), -- メールアドレス
  permission integer NOT NULL DEFAULT 0, -- 権限レベル(0:一般 1:管理者
  is_valid character varying(1) NOT NULL DEFAULT 1, -- 有効フラグ
  CONSTRAINT pk_users PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.m_users
  OWNER TO postgres;
COMMENT ON TABLE public.m_users
  IS 'ユーザ情報テーブル';
COMMENT ON COLUMN public.m_users.id IS 'ユーザID';
COMMENT ON COLUMN public.m_users.name IS 'ユーザ名';
COMMENT ON COLUMN public.m_users.password IS 'パスワード';
COMMENT ON COLUMN public.m_users.tel_no IS '電話番号';
COMMENT ON COLUMN public.m_users.mobile_no IS '携帯番号';
COMMENT ON COLUMN public.m_users.email IS 'メールアドレス';
COMMENT ON COLUMN public.m_users.permission IS '権限レベル(0:一般 1:管理者';
COMMENT ON COLUMN public.m_users.is_valid IS '有効フラグ';

