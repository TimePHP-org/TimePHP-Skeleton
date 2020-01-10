# venv\Script\activate


from faker import Faker
import pymysql

faker = Faker("fr_FR")

connection = pymysql.connect(host='localhost', user='root', password='root', db='dbTest', charset='utf8mb4', cursorclass=pymysql.cursors.DictCursor)

with connection:
    cur = connection.cursor()
    for _ in range(100):
        sql = "INSERT INTO User(nom, prenom, age, email) VALUES (%s, %s, %s, %s)"
        cur.execute(sql, (faker.first_name(), faker.last_name(), faker.pyint(min_value=15, max_value=85, step=1), faker.simple_profile(sex=None)["mail"]))

    for _ in range(500):
        sql = "INSERT INTO Article(titre, contenu, date, slug, id_User) VALUES (%s, %s, %s, %s, %s)"
        titre = faker.text(max_nb_chars=200, ext_word_list=None)
        slug = titre[:-1].replace(" ", "-")
        cur.execute(sql, (titre, faker.text(max_nb_chars=600, ext_word_list=None), faker.date(pattern="%Y-%m-%d", end_datetime=None), slug, faker.pyint(min_value=1, max_value=100, step=1)))

connection.commit()