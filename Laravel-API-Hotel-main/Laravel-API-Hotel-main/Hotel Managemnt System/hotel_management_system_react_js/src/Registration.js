import { useState } from 'react';
import {Link} from 'react-router-dom';

import axios from 'axios';

const Registration = () => {
    const [name, setName] = useState("");
    const [userName, setUserName] = useState("");
    const [password, setPassword] = useState("");
    const [email, setEmail] = useState("");
    const [address, setAddress] = useState("");
    const [gender, setGender] = useState("");
    const [phoneNumber, setPhoneNumber] = useState("");
    const [nidNo, setNidNo] = useState("");
    const [age, setAge] = useState("");
    const [image, setImage] = useState("");

    const [msg, setMsg] = useState("");

    const handleForm = (e) => {
        e.preventDefault();
        var obj = { name: name, userName: userName, password: password, email: email, address: address, gender: gender, nidNo: nidNo, phoneNumber: phoneNumber, age: age, image: image};
        axios.post("http://localhost:8000/api/customer/signup", obj).then((succ) => {
            if (succ.data.msg==="Added Successfully") {
                alert("registration succesfull!");
                window.location="/";
            }
        }, (err) => {
            setMsg("Registration failed for Internal Server Problem");
        });
    }
    return (
        <div class="tablebody2">
        <fieldset align="center">
            <br/><br/>
            <h2>Registration</h2>
            <form onSubmit={handleForm} align="center">
                <table border="1" align="center">
                    <tr>
                        <td >
                            <span>Name </span>
                        </td>

                        <td >
                            <input type="text" value={name} onChange={function (e) { setName(e.target.value) }} placeholder="Name" required></input><br />
                        </td>
                    </tr>


                    <tr>
                        <td >
                            <span>User Name </span>
                        </td>

                        <td >
                            <input type="text" value={userName} onChange={function (e) { setUserName(e.target.value) }} placeholder="username" required></input><br />
                      
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <span>password </span>
                        </td>
                        <td>
                            <input type="password" value={password} onChange={(e) => { setPassword(e.target.value) }} placeholder="Password" required></input><br />
                       
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <span>email </span>
                        </td>
                        <td> 
                            <input type="email" value={email} onChange={(e) => { setEmail(e.target.value) }} placeholder="email" required></input><br />
                       
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <span>Gender</span>
                        </td>
                        <td> 
                            <input type="text" value={gender} onChange={(e) => { setGender(e.target.value) }} placeholder="Gender" required></input><br />
                         
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>Address</span>
                        </td>
                        <td> 
                            <input type="text" value={address} onChange={(e) => { setAddress(e.target.value) }} placeholder="address" required></input><br />
                         
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>Phone Number</span>
                        </td>
                        <td> 
                            <input type="text" value={phoneNumber} onChange={(e) => { setPhoneNumber(e.target.value) }} placeholder="Phone Number" required></input><br />
                         
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>NID</span>
                        </td>
                        <td> 
                            <input type="text" value={nidNo} onChange={(e) => { setNidNo(e.target.value) }} placeholder="NID Number" required></input><br />
                         
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>Age</span>
                        </td>
                        <td> 
                            <input type="text" value={age} onChange={(e) => { setAge(e.target.value) }} placeholder="Age" required></input><br />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>Image</span>
                        </td>
                        <td> 
                            <input type="file" value={image} onChange={(e) => { setImage(e.target.value) }} required></input><br />
                        </td>
                    </tr>


                    <tr >
                        <td>
                            <button type="submit" ><Link to="/">Login</Link> </button> &nbsp; &nbsp;&nbsp;
                            <button type="submit">Register</button>
                            
                        </td>
                        <td><span className='text-danger'>{msg}</span></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        </div>
    )
}
export default Registration;
