import React from 'react';
import ReactDOM from 'react-dom/client';
import {BrowserRouter as Router,Route,Routes} from 'react-router-dom';

import './index.css';
import App from './App';
import Login from './Login';
import Dashboard from './Dashboard';
import Registration from './Registration';
import reportWebVitals from './reportWebVitals';

import Header from './Header';
import Footer from './Footer';
import RoomBook from './RoomBook';
import AddRoomBook from './AddRoomBook';
import Gym from './Gym';
import AddGym from './AddGym';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <Header></Header>
    <Router>
      <Routes>
          <Route path="/" element={<Login/>}></Route>
          <Route path="/dashboard" element={<Dashboard/>}></Route>
          <Route path="/regis" element={<Registration/>}></Route> 
          <Route path="/RoomBook" element={<RoomBook/>}></Route> 
          <Route path="/addRoom" element={<AddRoomBook/>}></Route>   
          <Route path="/Gym" element={<Gym/>}></Route>  
          <Route path="/addGym" element={<AddGym/>}></Route>  
      </Routes>
    </Router>
    
    <Footer></Footer>
   
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
