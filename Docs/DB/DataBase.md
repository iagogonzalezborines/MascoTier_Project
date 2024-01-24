

## Entity-relation model 
![An image of the draw.io of the DB](images/image.png)

## Relational model

User (User_ID,Email,Pwd,Phone, Place, Area)
    Owner(User_ID)
    Carer(User_ID,Rating,Status,ID_Doc,Descr)

Pet(Pet_ID,User_ID,Descr,Type)


Request(Request_ID, User_Owner_ID, User_Carer_ID, Amount, Date_Time, Status)

Requests_Pets(Request_ID, Pet_ID)


Chat(User_ID,User_ID,msg,date_time)

