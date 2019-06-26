from sqlalchemy import create_engine, Table, MetaData, Column, String

engine = create_engine(
    'postgresql://postgres:password@localhost:5432/markers')
