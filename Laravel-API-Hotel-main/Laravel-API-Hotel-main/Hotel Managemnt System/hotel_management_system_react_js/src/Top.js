import React from 'react';
import {Link} from 'react-router-dom';

const Top=()=>{

    return(
       <div>
           <div align="center">
                <button type="button"><Link to="/addRoom">Add Room</Link></button> &nbsp;&nbsp;&nbsp;
                <button type="button"><Link to="/RoomBook">Room Book List</Link> </button> &nbsp; &nbsp;&nbsp;
                <button type="button"><Link to="/addGym">Add Gym</Link> </button> &nbsp;&nbsp;&nbsp;
                <button type="button" ><Link to="/Gym">Gym List</Link> </button> &nbsp; &nbsp;&nbsp;<br></br><br></br>
                <button type="button" ><Link to="/">Log Out</Link> </button>
           </div>
       </div>
    ) 

}
export default Top;

