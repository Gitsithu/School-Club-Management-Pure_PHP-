<?php
include('connect.php');
//-----------------Drop table-----------------------------
$query="drop table Booking";
$run=mysqli_query($connection,$query);

$query="drop table Record";
$run=mysqli_query($connection,$query);

$query="drop table Reply";
$run=mysqli_query($connection,$query);

$query="drop table Forum";
$run=mysqli_query($connection,$query);

$query="drop table Member";
$run=mysqli_query($connection,$query);

//---------------------Member------------------------------

$query="
		Create table Member
		(			
			MemberID int Auto_Increment not null Primary key,
			ParentName varchar(30),
			ChildName varchar(30),
			DOB date,
			Email varchar(30),
			Address varchar(225),
			Phone varchar(30),
			Comment varchar(225),			
			Password varchar(50),
			ClassType varchar(40),
			MemberImage text,
			Age int
		)
		";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "Create member table successfully ";
}
else
{
	echo mysqli_error($connection);
}

$query="Insert into Member values 
		('1','Sithu','stns','2000-4-3','sithu@gmail.com','northdagon','09250676233','hee hee','sithu','singing','clubimage/face1.jpg','18')";
$run=mysqli_query($connection,$query);

$query="Insert into Member values 
		('2','Sithu','stns','2000-4-3','st@gmail.com','northdagon','09250676233','hee hee','sithu','singing','clubimage/a.jpg','18')";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Insert member table successfully";
}
else
{
	echo mysqli_error($connection);
}


//---------------------------------------------------
// $query="";
// $run=mysqli_query($connection,$query);

// if ($run) 
// {
// 	echo "Create member table";
// }
// else
// {
// 	echo mysqli_error($connection);
// }
//-----------------------Forum--------------------------



$query="
		Create table Forum
		(			
			ForumID int Auto_Increment not null Primary key,
			MemberID int,
			ForumPostedDate timestamp,
			ForumText text,
			FOREIGN KEY (MemberID) REFERENCES Member(MemberID)
		)
		";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Create forum table successfully";
}
else
{
	echo mysqli_error($connection);
}

$query="Insert into Forum (MemberID,ForumText)
	    values ('1','Hi! Nice to meet you.')";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Insert forum table successfully";
}
else
{
	echo mysqli_error($connection);
}


//----------------------Reply---------------------------
$query="
		Create table Reply
		(	
		    ReplyID int Auto_Increment not null primary key,
		    MemberID int,
		    ReplyPostedDate timestamp,
		    ReplyText text,
		    ForumID  int,

		    FOREIGN KEY (MemberID) REFERENCES Member(MemberID),

		    FOREIGN KEY (ForumID) REFERENCES Forum(ForumID)

		)
		";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Create reply table successfully";
}
else
{
	echo mysqli_error($connection);
}

$query="Insert into Reply (MemberID,ForumID,ReplyText)
	    values ('1','1','Thank anyway!')";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Insert reply table successfully";
}
else
{
	echo mysqli_error($connection);
}
//-----------------Record(cookies)------------------------
$query="Create Table Record
        (
		RecordID int Auto_Increment not null primary key,
		RecordDate timestamp,
		RecordTitle text,
		MemberID int,
		FOREIGN KEY (MemberID) REFERENCES Member(MemberID)

        )";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Create record table successfully";
}
else
{
	echo mysqli_error($connection);
}
$query="Insert into Record (RecordTitle,MemberID) values('HOHO','1')";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Insert record table successfully";
}
else
{
	echo mysqli_error($connection);
}

//------------------------Booking-----------------------------
$query="Create Table Booking
        (
			BookingID int Auto_Increment not null primary key,
			BookingDate timestamp,
			ClassType varchar(30),
			MemberID int,
			FOREIGN KEY (MemberID) REFERENCES Member(MemberID)
        )";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Create booking table successfully";
}
else
{
	echo mysqli_error($connection);
}
$query="Insert into Booking (MemberID,ClassType) values('1','Dance')";
$run=mysqli_query($connection,$query);

if ($run) 
{
	echo "<br>Insert booking table successfully";
}
else
{
	echo mysqli_error($connection);
}


//-----------------------------------------------------------

?>