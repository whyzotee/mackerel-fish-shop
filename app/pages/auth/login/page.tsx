"use client";

import Link from "next/link";
import { Button } from "@nextui-org/react";
import { useRouter } from "next/navigation";

export default function Login() {
  const router = useRouter();

  return (
    <main className="h-screen flex flex-col justify-center items-center">
      <h1 className="text-3xl">โปรดเข้าสู่ระบบ</h1>
      <br />
      <form
        action=""
        method="GET"
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
          <Button color="danger" type="submit">
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
