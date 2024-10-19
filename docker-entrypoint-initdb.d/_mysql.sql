-- Создание базы данных
CREATE DATABASE bus_schedule;

-- Подключение к базе данных (выполняется в командной строке или через pgAdmin)
-- c bus_schedule;

-- Таблица остановок
CREATE TABLE stops (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    latitude DECIMAL(9,6),
    longitude DECIMAL(9,6)
);

-- Таблица маршрутов
CREATE TABLE routes (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    end_stop_id INT REFERENCES stops(id)
);

-- Таблица остановок маршрута
CREATE TABLE route_stops (
    id SERIAL PRIMARY KEY,
    route_id INT REFERENCES routes(id),
    stop_id INT REFERENCES stops(id),
    order_number INT
);

-- Таблица расписания автобусов
CREATE TABLE bus_schedules (
    id SERIAL PRIMARY KEY,
    route_id INT REFERENCES routes(id),
    arrival_time TIME
);
-- Добавление остановок
INSERT INTO stops (name, latitude, longitude) VALUES 
('Остановка 1', 55.7558, 37.6173),
('Остановка 2', 55.7560, 37.6180),
('Остановка 3', 55.7570, 37.6190),
('Остановка 4', 55.7580, 37.6200);

-- Добавление маршрутов
INSERT INTO routes (name, end_stop_id) VALUES 
('Маршрут 1', 4),
('Маршрут 2', 3);

-- Добавление остановок маршрута
INSERT INTO route_stops (route_id, stop_id, order_number) VALUES 
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(2, 1, 1),
(2, 3, 2),
(2, 4, 3);

-- Добавление расписания автобусов
INSERT INTO bus_schedules (route_id, arrival_time) VALUES 
(1, '09:00:00'),
(1, '09:30:00'),
(1, '10:00:00'),
(2, '10:15:00'),
(2, '10:45:00');
