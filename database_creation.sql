use Nutricheck;

DROP TABLE IF EXISTS Ingredients;
DROP TABLE IF EXISTS Instructions;
DROP TABLE IF EXISTS Recipes;

CREATE TABLE Recipes(
    id int AUTO_INCREMENT,
    name varchar(255),
    unit varchar(255),
    goal varchar(255),
    cals int,
    protein int,
    fats int,
    carbs int,
    PRIMARY KEY(id)
);

CREATE TABLE Ingredients(
    id int AUTO_INCREMENT,
    recipe_id int,
    name varchar(255),
    unit varchar(255),
    total_weight int,
    num_serv int,
    cals int,
    protein int,
    fats int,
    carbs int,
    PRIMARY KEY(id),
    FOREIGN KEY (recipe_id) REFERENCES recipes(id)
);

CREATE TABLE Instructions(
    id int AUTO_INCREMENT,
    recipe_id int,
    page varchar(255),
    PRIMARY KEY(id),
    FOREIGN KEY (recipe_id) REFERENCES recipes(id)
);

INSERT INTO Recipes(name, unit, goal, cals, protein, fats, carbs) VALUES ("Chicken Noodle", "oz", "NA", 62.1, 1.9, 1.5, 9.6);

INSERT INTO Ingredients(name, recipe_id, unit, total_weight, num_serv, cals, protein, fats, carbs) VALUES ("Egg Noodle", 1, "oz", 16, 8, 220, 8, 2.5, 40);
INSERT INTO Ingredients(name, recipe_id, unit, total_weight, num_serv, cals, protein, fats, carbs) VALUES ("Cream of Chicken", 1, "oz", 22.6, 5, 120, 2, 8, 9);