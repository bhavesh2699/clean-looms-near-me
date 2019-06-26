from database import engine
print("creating db")
with engine.connect() as conn:

    conn.execute(
    """
    DROP TABLE IF EXISTS markers;
    """
    )

    conn.execute("""
        CREATE TABLE IF NOT EXISTS markers (
          id SERIAL PRIMARY KEY ,
          name VARCHAR( 255 ) NOT NULL ,
          address VARCHAR( 255 ) NOT NULL ,
          lat NUMERIC( 10, 6 ) NOT NULL ,
          lng NUMERIC( 10, 6 ) NOT NULL
         );
    """)
