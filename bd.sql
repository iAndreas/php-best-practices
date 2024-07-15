CREATE DATABASE bug_app_testing;

CREATE TABLE reports (
  id int NOT NULL,
  report_type varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  message varchar(255) NOT NULL,
  link varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  deleted_at timestamp NULL DEFAULT NULL
);

CREATE SEQUENCE reports_id_seq OWNED BY reports.id;
ALTER TABLE reports ALTER COLUMN id SET DEFAULT nextval('reports_id_seq');
