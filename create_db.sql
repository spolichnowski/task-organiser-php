CREATE DATABASE ce154_sp18885;

CREATE TABLE users(
        user_id INT AUTO_INCREMENT NOT NULL,
        first_name VARCHAR(200) NOT NULL,
        last_name VARCHAR(200) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (user_id)
);

CREATE TABLE projects (
        project_id INT NOT NULL AUTO_INCREMENT,
        user_id INT,
        project_name VARCHAR(250),
        date_created DATE,
        description VARCHAR(500),
        PRIMARY KEY (project_id, user_id),
        FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE tasks (
        task_id INT AUTO_INCREMENT,
        user_id INT,
        project_id INT,
        task_name VARCHAR(255),
        details VARCHAR(500),
        date_created DATE,
        deadline DATE,
        priority INT,
        done tinyint(0),
        PRIMARY KEY (task_id, project_id, user_id),
        FOREIGN KEY (user_id) REFERENCES users(user_id),
        FOREIGN KEY (project_id) REFERENCES projects(project_id)
);