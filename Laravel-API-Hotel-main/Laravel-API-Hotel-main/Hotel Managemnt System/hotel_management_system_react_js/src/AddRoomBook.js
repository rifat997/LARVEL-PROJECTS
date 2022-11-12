import { useState } from 'react';
import {Link} from 'react-router-dom';

import axios from 'axios';

const AddRoomBook = () => {
    const [RoomNo, setRoomNo] = useState("");
    const [Branch, setBranch] = useState("");
    const [NID, setNID] = useState("");
    const [Address, setAddress] = useState("");
    const [Email, setEmail] = useState("");
    const [Phone, setPhone] = useState("");
    const [CIT, setCIT] = useState("");
    const [COT, setCOT] = useState("");

    const [msg, setMsg] = useState("");

    const handleForm = (e) => {
        e.preventDefault();
        var obj = { RoomNo: RoomNo, Branch: Branch, NID: NID, Address: Address, Email: Email, Phone: Phone, CIT: CIT, COT: COT};
        axios.post("http://localhost:8000/api/customer/room/book", obj).then((succ) => {
            if (succ.data.msg==="Room Added Successfully") {
                alert("Room Added succesfull!");
                window.location="/RoomBook";
            }
        }, (err) => {
            setMsg("Room Added failed for Internal Server Problem");
        });
    }
    return (
        <div class="tablebody2">
        <fieldset align="center">
            <br/><br/>
            <h2>Adding Room</h2>
            <form onSubmit={handleForm} align="center">
                <table border="1" align="center">
                    <tr>
                        <td >
                            <span>Room Number </span>
                        </td>

                        <td >
                            <input type="text" value={RoomNo} onChange={function (e) { setRoomNo(e.target.value) }} placeholder="Room Number" required></input><br />
                        </td>
                    </tr>

                    <tr>
                        <td >
                            <span>Branch </span>
                        </td>

                        <td >
                            <input type="text" value={Branch} onChange={function (e) { setBranch(e.target.value) }} placeholder="Branch" required></input><br />
                        </td>
                    </tr>


                    <tr>
                        <td >
                            <span>NID </span>
                        </td>

                        <td >
                            <input type="text" value={NID} onChange={function (e) { setNID(e.target.value) }} placeholder="Nid Number" required></input><br />
                        </td>
                    </tr>

                    <tr>
                        <td >
                            <span>Address </span>
                        </td>

                        <td >
                            <input type="text" value={Address} onChange={function (e) { setAddress(e.target.value) }} placeholder="Address" required></input><br />
                        </td>
                    </tr>

                    <tr>
                        <td >
                            <span>Email </span>
                        </td>

                        <td >
                            <input type="email" value={Email} onChange={function (e) { setEmail(e.target.value) }} placeholder="Email" required></input><br />
                        </td>
                    </tr>


                    <tr>
                        <td >
                            <span>Phone </span>
                        </td>

                        <td >
                            <input type="text" value={Phone} onChange={function (e) { setPhone(e.target.value) }} placeholder="Phone Number" required></input><br />
                        </td>
                    </tr>


                    <tr>
                        <td >
                            <span>Check In Time </span>
                        </td>

                        <td >
                            <input type="text" value={CIT} onChange={function (e) { setCIT(e.target.value) }} placeholder="Check In Time" required></input><br />
                        </td>
                    </tr>


                    <tr>
                        <td >
                            <span>Check Out Time</span>
                        </td>

                        <td >
                            <input type="text" value={COT} onChange={function (e) { setCOT(e.target.value) }} placeholder="Check Out Time" required></input><br />
                        </td>
                    </tr>
                    <br></br>
                    <tr align="center">
                        <td colspan="2" align="center">
                            <button type="submit">Add Room</button>
                        </td>
                        <td><span className='text-danger'>{msg}</span></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        </div>
    )
}
export default AddRoomBook;
