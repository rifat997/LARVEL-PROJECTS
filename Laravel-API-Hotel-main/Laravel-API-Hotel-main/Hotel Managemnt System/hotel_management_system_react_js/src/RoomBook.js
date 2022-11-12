import {useState,useEffect} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import React, { Component }  from 'react';
import {Link} from 'react-router-dom';

const RoomBook =()=>{
    
    const [st, setSt] = useState([]);
    const [msg, setMsg] = useState("");
    
    useEffect( ()=>{
        
        axios.get("http://localhost:8000/api/customer/room/book/list")
        .then( function(rsp) {
            setSt(rsp.data);
        })
        .catch( err => {
            console.log(err);
        });

    },[]);

    const deleteRoom = (e, id) => {
        e.preventDefault();
        axios.get(`http://localhost:8000/api/customer/room/book/delete/${id}`).then( (res) => {
            if(res.data.msg === "Room Deleted Successfully"){
                setMsg("Deleted Successful");
                alert("Room Added succesfull!");
                window.location="/RoomBook";
            }
           else{
            setMsg("Delete failed for Internal Server Problem");
           }
        });
    }
    
    return (
        <div align="center">

            <Link to="/dashboard">Home</Link> &nbsp;&nbsp;
            <Link to="/">Logout</Link> &nbsp;&nbsp;
            <br></br>

            <table border="1">
                
                <thead>
                    <tr>
                        <th>RoomNo</th>
                        <th>Branch</th>
                        <th>NID</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>CIT</th>
                        <th>COT</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                {
                    st.map( post => (
                        <tr key={post.id}>
                            <td>{post.RoomNo}</td>
                            <td>{post.Branch}</td>
                            <td>{post.NID}</td>
                            <td>{post.Email}</td>
                            <td>{post.Phone}</td>
                            <td>{post.Phone}</td>
                            <td>{post.CIT}</td>
                            <td>{post.COT}</td>
                            <td><button type="button" onClick = {(e) => deleteRoom(e, post.id)}>Delete</button></td>
                        </tr>
                     ) )
                }    
                </tbody>

            </table>
        </div>
    )
}

export default RoomBook;