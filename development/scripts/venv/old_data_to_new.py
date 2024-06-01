from sqlalchemy import create_engine
import pandas as pd

# Oude en nieuwe database connectiestrings voor MySQL/MariaDB
old_db_conn_str = 'mysql+pymysql://root:@localhost:port/live.gouden_draak'
new_db_conn_str = 'mysql+pymysql://root:@localhost:port/dev.gouden_draak'

# Verbinding maken met beide databases
old_engine = create_engine(old_db_conn_str)
new_engine = create_engine(new_db_conn_str)

# Data ophalen uit de oude database
query = "SELECT * FROM menu"
old_data = pd.read_sql(query, old_engine)

# Transformaties toepassen
transformed_data = pd.DataFrame()
transformed_data['id'] = old_data['id']
transformed_data['name'] = old_data['naam']
transformed_data['description'] = old_data['beschrijving']

# Data invoegen in de nieuwe database
transformed_data.to_sql('dishes', new_engine, if_exists='append', index=False)

print("Migratie voltooid.")
