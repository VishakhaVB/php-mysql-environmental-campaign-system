-- Create database for login/signup system.
CREATE DATABASE IF NOT EXISTS login_system;
USE login_system;

-- Users table requested by the project.
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Volunteer registration form submissions.
CREATE TABLE IF NOT EXISTS volunteer_registrations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL,
  phone VARCHAR(25) NOT NULL,
  skill VARCHAR(80) NOT NULL,
  motivation TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contact inquiry form submissions.
CREATE TABLE IF NOT EXISTS contact_inquiries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
