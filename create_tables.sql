CREATE TABLE room (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  projector ENUM("HDMI", "VGA"),
  capacity INT(1) NOT NULL
);

CREATE TABLE user (
  student_id INT(6) UNSIGNED PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  phone_number INT(8) UNSIGNED NOT NULL,
  email_address VARCHAR(150) NOT NULL
);

CREATE TABLE booking (
  id INT(12) UNSIGNED AUTO_INCREMENT,
  booked_from DATETIME,
  booked_to DATETIME,
  room_id INT(6) UNSIGNED,
  user_id INT(6) UNSIGNED,
  PRIMARY KEY (id),
  FOREIGN KEY (room_id) REFERENCES room(id),
  FOREIGN KEY (user_id) REFERENCES user(student_id),
  added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO room VALUES
(NULL, 'Rom 81', 1, 2),
(NULL, 'Rom 42', 2, 3),
(NULL, 'Rom 4', 1, 4),
(NULL, 'Rom 10', 2, 2);

INSERT INTO user VALUES
(701395, 'Frode B.', 46899973, 'frode@riseup.net');

INSERT INTO booking VALUES
(NULL, '2015-03-16 12:00:00', '2015-03-16 14:00:00', 5, 701395, NULL),
(NULL, '2015-03-17 12:00:00', '2015-03-17 14:00:00', 5, 701395, NULL);

SELECT *
FROM booking LEFT JOIN room
ON booking.room_id = room.id;