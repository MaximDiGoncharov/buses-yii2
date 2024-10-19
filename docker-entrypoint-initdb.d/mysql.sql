-- Таблица автобусов
CREATE TABLE buses (
    bus_id SERIAL PRIMARY KEY,
    bus_number VARCHAR(10) NOT NULL,
    capacity INT NOT NULL
);

-- Таблица маршрутов
CREATE TABLE routes (
    route_id SERIAL PRIMARY KEY,
    route_name VARCHAR(50) NOT NULL,
    direction VARCHAR(10) CHECK (direction IN ('forward', 'backward')),
    start_stop_id INT REFERENCES stops(stop_id),
    end_stop_id INT REFERENCES stops(stop_id)
);

-- Таблица остановок
CREATE TABLE stops (
    stop_id SERIAL PRIMARY KEY,
    stop_name VARCHAR(100) NOT NULL,
    latitude DECIMAL(9,6),
    longitude DECIMAL(9,6)
);

-- Промежуточная таблица для связи маршрутов и остановок
CREATE TABLE route_stops (
    route_stop_id SERIAL PRIMARY KEY,
    route_id INT REFERENCES routes(route_id),
    stop_id INT REFERENCES stops(stop_id),
    sequence_number INT NOT NULL,
    direction VARCHAR(10) CHECK (direction IN ('forward', 'backward'))
);

-- Таблица рейсов
CREATE TABLE trips (
    trip_id SERIAL PRIMARY KEY,
    route_id INT REFERENCES routes(route_id),
    bus_id INT REFERENCES buses(bus_id),
    departure_time TIMESTAMP,
    arrival_time TIMESTAMP
);

-- Таблица расписания
CREATE TABLE schedule (
    schedule_id SERIAL PRIMARY KEY,
    trip_id INT REFERENCES trips(trip_id),
    stop_id INT REFERENCES stops(stop_id),
    arrival_time TIMESTAMP,
    departure_time TIMESTAMP
);



-- Вставка данных в таблицу автобусов
INSERT INTO buses (bus_number, capacity)
VALUES 
('A101', 50),
('A102', 50),
('B201', 60),
('B202', 60),
('C301', 55);

-- Вставка данных в таблицу остановок
INSERT INTO stops (stop_name, latitude, longitude)
VALUES
('Stop 1', 55.7558, 37.6173),
('Stop 2', 55.7578, 37.6178),
('Stop 3', 55.7598, 37.6193),
('Stop 4', 55.7618, 37.6208),
('Stop 5', 55.7638, 37.6223),
('Stop 6', 55.7658, 37.6238),
('Stop 7', 55.7678, 37.6253),
('Stop 8', 55.7698, 37.6268),
('Stop 9', 55.7718, 37.6283),
('Stop 10', 55.7738, 37.6298),
('Stop 11', 55.7758, 37.6313),
('Stop 12', 55.7778, 37.6328),
('Stop 13', 55.7798, 37.6343),
('Stop 14', 55.7818, 37.6358),
('Stop 15', 55.7838, 37.6373),
('Stop 16', 55.7858, 37.6388),
('Stop 17', 55.7878, 37.6403),
('Stop 18', 55.7898, 37.6418),
('Stop 19', 55.7918, 37.6433),
('Stop 20', 55.7938, 37.6448);

-- Вставка данных в таблицу маршрутов
INSERT INTO routes (route_name, direction, start_stop_id, end_stop_id)
VALUES 
('Route A', 'forward', 1, 10),
('Route A', 'backward', 10, 1),
('Route B', 'forward', 11, 20),
('Route B', 'backward', 20, 11);

-- Привязка остановок к маршруту A (прямой)
INSERT INTO route_stops (route_id, stop_id, sequence_number, direction)
VALUES 
(1, 1, 1, 'forward'),
(1, 2, 2, 'forward'),
(1, 3, 3, 'forward'),
(1, 4, 4, 'forward'),
(1, 5, 5, 'forward'),
(1, 6, 6, 'forward'),
(1, 7, 7, 'forward'),
(1, 8, 8, 'forward'),
(1, 9, 9, 'forward'),
(1, 10, 10, 'forward');

-- Привязка остановок к маршруту A (обратный)
INSERT INTO route_stops (route_id, stop_id, sequence_number, direction)
VALUES 
(2, 10, 1, 'backward'),
(2, 9, 2, 'backward'),
(2, 8, 3, 'backward'),
(2, 7, 4, 'backward'),
(2, 6, 5, 'backward'),
(2, 5, 6, 'backward'),
(2, 4, 7, 'backward'),
(2, 3, 8, 'backward'),
(2, 2, 9, 'backward'),
(2, 1, 10, 'backward');

-- Привязка остановок к маршруту B (прямой)
INSERT INTO route_stops (route_id, stop_id, sequence_number, direction)
VALUES 
(3, 11, 1, 'forward'),
(3, 12, 2, 'forward'),
(3, 13, 3, 'forward'),
(3, 14, 4, 'forward'),
(3, 15, 5, 'forward'),
(3, 16, 6, 'forward'),
(3, 17, 7, 'forward'),
(3, 18, 8, 'forward'),
(3, 19, 9, 'forward'),
(3, 20, 10, 'forward');

-- Привязка остановок к маршруту B (обратный)
INSERT INTO route_stops (route_id, stop_id, sequence_number, direction)
VALUES 
(4, 20, 1, 'backward'),
(4, 19, 2, 'backward'),
(4, 18, 3, 'backward'),
(4, 17, 4, 'backward'),
(4, 16, 5, 'backward'),
(4, 15, 6, 'backward'),
(4, 14, 7, 'backward'),
(4, 13, 8, 'backward'),
(4, 12, 9, 'backward'),
(4, 11, 10, 'backward');


-- Вставка данных в таблицу рейсов
INSERT INTO trips (route_id, bus_id, departure_time, arrival_time)
VALUES
(1, 1, '2024-10-18 08:00:00', '2024-10-18 09:00:00'),
(2, 1, '2024-10-18 09:30:00', '2024-10-18 10:30:00'),
(3, 2, '2024-10-18 08:00:00', '2024-10-18 09:00:00'),
(4, 2, '2024-10-18 09:30:00', '2024-10-18 10:30:00');

-- Вставка данных в таблицу расписания
INSERT INTO schedule (trip_id, stop_id, arrival_time, departure_time)
VALUES
(1, 1, '2024-10-18 08:00:00', '2024-10-18 08:02:00'),
(1, 2, '2024-10-18 08:10:00', '2024-10-18 08:12:00'),
(1, 3, '2024-10-18 08:20:00', '2024-10-18 08:22:00'),
-- остальные остановки
(1, 10, '2024-10-18 09:00:00', NULL);
