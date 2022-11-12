import {useState,useEffect} from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import React, { Component }  from 'react';
import {Link} from 'react-router-dom';

const Profile =()=>{
    
    const [st, setSt] = useState([]);
    
    useEffect( ()=>{
        
        axios.get("http://localhost:8000/api/customer/profile")
        
        .then( function(rsp) {
            //debugger;
            setSt(rsp.data);
            //console.log(rsp.data);
        })
        
        .catch( err => {
            console.log(err);
        
        });

    },[]);
    
    return (
        <div align="center">

            <Link to="/dashboard">Home</Link> &nbsp;&nbsp;
            <Link to="/">Logout</Link> &nbsp;&nbsp;
            <br></br>

            
        </div>
    )
}

export default Profile;