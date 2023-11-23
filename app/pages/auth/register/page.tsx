"use client";
import { Button } from "@nextui-org/react";
import { FormEvent, useState } from "react";
import { basePath } from "@/app/core/settings";
import Swal from "sweetalert2";

export default function Register() {
  const [userData, setUserData] = useState({
    username: "",
    password: "",
    firstname: "",
    lastname: "",
    email: "",
    status: "CUSTOMER"
  })
  const [conPass, setConPass] = useState("")

  const onSubmit = async (event: FormEvent) => {
    if (conPass !== userData.password) {
      console.log(conPass);
      console.log(userData.password);

      return Swal.fire({
        title: "ล้มเหลว",
        text: "รหัสผ่านไม่ตรงกัน",
        icon: "error",
        confirmButtonText: "ตลลง",
      });
    }

    try {
      const response = await fetch(`${basePath}/php/register.php`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData),
      });

      if (response.ok) {
        Swal.fire({
          title: "สำเร็จ",
          text: "เข้าสู่ระบบเสร็จสิ้น กด ตลลง เพื่อดำเนินการต่อ",
          icon: "success",
          confirmButtonText: "ตลลง",
          confirmButtonColor: "#5CD1FF",
        });
        console.log('Data inserted successfully!');
      } else {
        Swal.fire({
          title: "ล้มเหลว",
          text: "รหัสผ่านไม่ตรงกัน",
          icon: "error",
          confirmButtonText: "ตลลง",
        });
        console.error('Failed to insert data.');
      }
    } catch (error) {
      Swal.fire({
        title: "ล้มเหลว",
        text: "Error inserting data:" + error,
        icon: "error",
        confirmButtonText: "ตลลง",
      });
      console.error('Error inserting data:', error);
    }
  }

  const handleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    const value = event.target.value;
    setUserData({ ...userData, [event.target.name]: value });
  };

  return (
    <main className="h-screen flex flex-col justify-center items-center pt-12">
      <h1 className="text-3xl">ลงทะเบียน</h1>
      <br />
      <form
        // method="POST"
        // action={`${basePath}/php/register.php`}
        className="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4"
      >
        <div className="mb-4">
          <label
            className="block text-gray-700 text-sm font-bold mb-2"
          >
            ชื่อผู้ใช้งาน
          </label>
          <input
            className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="username"
            name="username"
            value={userData.username}
            onChange={handleChange}
            type="text"
            placeholder="Username"
            required
          />
        </div>
        <div className="flex gap-4">
          <div className="mb-4">
            <label className="block text-gray-700 text-sm font-bold mb-2">
              Password
            </label>
            <input
              className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="password"
              name="password"
              value={userData.password}
              onChange={handleChange}
              type="password"
              placeholder="Password"
              required
            />
          </div>
          <div className="mb-4">
            <label className="block text-gray-700 text-sm font-bold mb-2">
              Confirm Password
            </label>
            <input
              className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="con_password"
              name="con_password"
              onChange={(e) => setConPass(e.target.value)}
              type="password"
              placeholder="Confirm Password"
              required
            />
          </div>
        </div>
        <div className="flex gap-4">
          <div className="mb-4">
            <label className="block text-gray-700 text-sm font-bold mb-2">
              First Name
            </label>
            <input
              className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="firstname"
              name="firstname"
              value={userData.firstname}
              onChange={handleChange}
              placeholder=" First Name"
              required
            />
          </div>
          <div className="mb-4">
            <label className="block text-gray-700 text-sm font-bold mb-2">
              Last Name
            </label>
            <input
              className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="lastname"
              name="lastname"
              value={userData.lastname}
              onChange={handleChange}
              placeholder="Last Name"
              required
            />
          </div>
        </div>
        <div className="mb-4">
          <label
            className="block text-gray-700 text-sm font-bold mb-2"
            htmlFor="username"
          >
            Email
          </label>
          <input
            className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="email"
            name="email"
            value={userData.email}
            onChange={handleChange}
            placeholder="Email"
            required
          />
        </div>
        <div className="flex items-center justify-center mt-8">
          <Button color="danger" onClick={onSubmit}>
            สมัครสมาชิก
          </Button>
        </div>
      </form>
    </main>
  );
}
