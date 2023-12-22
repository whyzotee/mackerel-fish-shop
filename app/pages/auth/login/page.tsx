"use client";

import Link from "next/link";
import { Button } from "@nextui-org/react";
import { useRouter } from "next/navigation";
import { useState } from "react";
import { basePath } from "@/app/core/settings";
import Swal from "sweetalert2";

export default function Login() {
  const router = useRouter();
  const [userData, setUserData] = useState({
    username: "",
    password: "",
  })

  const onSubmit = async () => {
    if (userData.password == "" || userData.password == "") return;

    try {
      const response = await fetch(`${basePath}/php/login.php`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData),
      });

      console.log(response.body);

      if (response.ok) {
        Swal.fire({
          title: "สำเร็จ",
          text: "เข้าสู่ระบบเสร็จสิ้น กด ตลลง เพื่อดำเนินการต่อ",
          icon: "success",
          confirmButtonText: "ตกลง",
          confirmButtonColor: "#5CD1FF",
        }).then((_) => {
          router.push("/pages/auth/login");
        });

        console.log('Data inserted successfully!');
      } else {
        Swal.fire({
          title: "ล้มเหลว",
          text: "Failed to insert data.",
          icon: "error",
          confirmButtonText: "ตกลง",
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
    <main className="h-screen flex flex-col justify-center items-center">
      <h1 className="text-3xl">โปรดเข้าสู่ระบบ</h1>
      <br />
      <form
        onSubmit={(event) => event.preventDefault()}
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
            name="username"
            type="text"
            value={userData.username}
            onChange={handleChange}
            placeholder="Username"
            required
          />
        </div>
        <div className="mb-4">
          <label className="block text-gray-700 text-sm font-bold mb-2">
            Password
          </label>
          <input
            className="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
            name="password"
            type="password"
            value={userData.password}
            onChange={handleChange}
            placeholder="Password"
            required
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
          <Button color="danger" type="submit" onClick={onSubmit}>
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
    </main >
  );
}
