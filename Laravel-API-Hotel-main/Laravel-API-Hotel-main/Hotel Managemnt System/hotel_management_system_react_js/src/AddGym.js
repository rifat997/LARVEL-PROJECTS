import { useState } from 'react';
import {Link} from 'react-router-dom';

import axios from 'axios';

const AddGym = () => {
    const [schedule, setSchedule] = useState("");

    const [msg, setMsg] = useState("");

    const handleForm = (e) => {
        e.preventDefault();
        var obj = { schedule: schedule};
        axios.post("http://localhost:8000/api/customer/gym/add", obj).then((succ) => {
            if (succ.data.msg==="Gym Schedule Added Successfully") {
                alert("Gym Added succesfull!");
                window.location="/Gym";
            }
        }, (err) => {
            setMsg("Registration failed for Internal Server Problem");
        });
    }
    return (
        <div class="tablebody2">
        <fieldset align="center">
            <br/><br/>
            <h2>Adding Gym</h2>
            <form onSubmit={handleForm} align="center">
                <table border="1" align="center">
                    <tr>
                        <td >
                            <span>Schedule </span>
                        </td>

                        <td >
                            <input type="text" value={schedule} onChange={function (e) { setSchedule(e.target.value) }} placeholder="Give a Time" required></input><br />
                        </td>
                    </tr>

                    <tr >
                        <td align="center">
                            <button type="submit">Add</button>
                            
                        </td>
                        <td><span className='text-danger'>{msg}</span></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        </div>
    )
}
export default AddGym;
