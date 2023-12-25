use Nutricheck;

DROP TABLE IF EXISTS Ingredients;
DROP TABLE IF EXISTS Instructions;
DROP TABLE IF EXISTS Recipes;

CREATE TABLE Recipes(
    id int AUTO_INCREMENT,
    name varchar(255),
    unit varchar(255),
    goal varchar(255),
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
    protein int,
    fats int,
    carbs int,
    PRIMARY KEY(id),
    FOREIGN KEY (recipe_id) REFERENCES recipes(id)
);

CREATE TABLE instructions(
    id int AUTO_INCREMENT,
    recipe_id int,
    page varchar(255),
    PRIMARY KEY(id),
    FOREIGN KEY (recipe_id) REFERENCES recipes(id)
);