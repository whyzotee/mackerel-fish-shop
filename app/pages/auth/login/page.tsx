"use client";

import Link from "next/link";
import { Button } from "@nextui-org/react";
import { useState } from "react";
import { useRouter } from "next/navigation";
import { basePath } from "@/app/core/settings";
import Swal from "sweetalert2";

export default function Login() {
  const [userData, setUserData] = useState({
    username: "",
    password: "",
  })

  const router = useRouter();

  const onSubmit = async () => {
    try {
      const response = await fetch(`${basePath}/php/check_login.php`, {
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


  return (
    <main className="h-screen flex flex-col justify-center items-center">
      <h1 className="text-3xl">โปรดเข้าสู่ระบบ</h1>
      <br />
      <form
        className="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4"
      >
        <div className="mb-4">
          <label
            className="block text-gray-700 text-sm font-bold mb-2"
            htmlFor="username"
          >
            ชื่อผู้ใช้งาน
          </label>
          <input
            className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="username"
            type="text"
            placeholder="Username"
            onChange={(event)=> setUserData({...userData,username: event.target.value})}
          />
        </div>
        <div className="mb-4">
          <label className="block text-gray-700 text-sm font-bold mb-2">
            Password
          </label>
          <input
            className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
            type="password"
            placeholder="Password"
            onChange={(event)=> setUserData({...userData,password: event.target.value})}
          />
        </div>
        <div className="flex justify-end">
          <Link
            className="font-bold text-sm text-[#F31260] hover:text-[#F31200]"
            href="#"
          >
            ลืมรหัสผ่าน?
          </Link>
        </div>
        <div className="flex items-center justify-between mt-4">
          <Button color="danger" onClick={onSubmit}>
            เข้าสู่ระบบ
          </Button>
          <Button
            color="danger"
            variant="ghost"
            onClick={() => router.push("/pages/auth/register")}
          >
            ลงทะเบียน
          </Button>
        </div>
      </form>
    </main>
  );
}
