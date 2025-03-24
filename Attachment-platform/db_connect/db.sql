CREATE DATABASE insurance;
USE insurance;


-- Students Table
CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    Students_reg VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pwd VARCHAR(100) NOT NULL,
    auth_token VARCHAR(100),
    cleared_with_finance BOOLEAN DEFAULT FALSE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- Attachments Table
CREATE TABLE attachments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    approved_by_director BOOLEAN DEFAULT FALSE,
    cover_letter_generated BOOLEAN DEFAULT FALSE,
    insurance_letter_generated BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
     created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `students` (`student_id`, `Students_reg`, `name`, `email`, `pwd`, `auth_token`, `cleared_with_finance`, `created_at`, `updated_at`) VALUES (NULL, 'btit/444j/2022', 'james Sadi', 'james@gmail.com', 'James@254', NULL, '0', current_timestamp(), current_timestamp()), (NULL, 'btit/333j/2022', 'marion sam', 'marion@gmail.com', 'Marion@254', NULL, '0', current_timestamp(), current_timestamp());