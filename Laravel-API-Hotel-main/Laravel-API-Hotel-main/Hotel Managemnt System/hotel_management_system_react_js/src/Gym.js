import {useState,useEffect} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import React, { Component }  from 'react';
import {Link} from 'react-router-dom';

const Gym =()=>{

    const [st, setSt] = useState([]);
    const [msg, setMsg] = useState("");
    
    useEffect( ()=>{
        axios.get("http://localhost:8000/api/customer/gym/list")
        .then( function(rsp) {
            setSt(rsp.data);
        })
        .catch( err => {
            console.log(err);
        });
    },[]);

    const deleteGym = (e, id) => {
        e.preventDefault();
        axios.get(`http://localhost:8000/api/customer/gym/delete/${id}`).then( (res) => {
            if(res.data.msg === "Gym Schedule Deleted Successfully"){
                setMsg("Deleted Successful");
                alert("Gym Added succesfull!");
                window.location="/Gym";
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
                        <th>ID</th>
                        <th>Schedule</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                {
                    st.map( post => (
                        <tr key={post.id}>
                            <td>{post.id}</td>
                            <td>{post.schedule}</td>
                            <td><button type="button" onClick = {(e) => deleteGym(e, post.id)}>Delete</button></td>
                        </tr>
                     ) )
                }    
                </tbody>

            </table>
        </div>
    )
}

export default Gym;