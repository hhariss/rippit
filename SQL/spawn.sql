CREATE TABLE Users ( 
	uid int AUTO_INCREMENT, 
	username char(20), 
	pwd char(20), 
	user_karma int, 
	join_date date, 
	ip_address char(45), 
	PRIMARY KEY(uid) 
); 

CREATE TABLE Posts ( 
	pid int AUTO_INCREMENT, 
	post_karma int, 
	post_title char(50), 
	post_content TEXT, 
	PRIMARY KEY (pid) 
); 

CREATE TABLE Votes ( 
	vote_type int,                                -- +1 for upvotes, -1 for downvotes 
	user_id int, 
	post_id int, 
	PRIMARY KEY (user_id, post_id), 
	FOREIGN KEY (user_id) REFERENCES Users(uid), 
	FOREIGN KEY (post_id) REFERENCES Posts(pid) 
); 

CREATE TABLE Publishes ( 
	publish_date date, 
	post_id int, 
	user_id int, 
	PRIMARY KEY(user_id, post_id), 
	FOREIGN KEY(user_id) REFERENCES Users(uid), 
	FOREIGN KEY(post_id) REFERENCES Posts(pid) 
); 

CREATE TABLE Admins ( 
	uid int, 
    user_name char(20), 
	pwd char(20), 
	user_karma int, 
	join_date date, 
	ip_address char(45), 
	permission_level int, 
	PRIMARY KEY(uid), 
	FOREIGN KEY(uid) REFERENCES Users(uid) 
); 

CREATE TABLE Sightings ( 
	pid int, 
	post_karma int,
	post_title char(50), 
	post_content TEXT, 
	country char(50), 
	city char(40), 
	PRIMARY KEY (pid) 
); 

--kind is 1 Feedback, 2 Report
CREATE TABLE Tickets (
    tid int AUTO_INCREMENT,
    kind int, 
    PRIMARY KEY (tid)
);

CREATE TABLE Feedbacks ( 
	ticket_id int,
	feedback_content TEXT,
	PRIMARY KEY (ticket_id),
    FOREIGN KEY(ticket_id) REFERENCES Tickets(tid)
); 

CREATE TABLE Reports ( 
	ticket_id int,
	report_target int, 
	report_content char(100),
    PRIMARY KEY (ticket_id),
    FOREIGN KEY(ticket_id) REFERENCES Tickets(tid),
	FOREIGN KEY(report_target) REFERENCES Users(uid)
);

CREATE TABLE Resolves ( 
	ticket_id int,
	user_id int,  
	PRIMARY KEY (ticket_id, user_id), 
	FOREIGN KEY (ticket_id) REFERENCES Tickets(tid),
	FOREIGN KEY (user_id) REFERENCES Admins(uid)
);

CREATE TABLE Makes ( 
	ticket_id int, 
	user_id int, 
	PRIMARY KEY (ticket_id, user_id), 
	FOREIGN KEY (ticket_id) REFERENCES Tickets(tid), 
	FOREIGN KEY (user_id) REFERENCES Users(uid) 
);