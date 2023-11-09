"use client";

import Image from "next/image";
import { basePath } from "@/app/core/settings";
import Link from "next/link";
import { useRouter } from "next/navigation";

export default function Navbar() {
  const router = useRouter();

  return (
    <nav className="fixed w-full bg-black bg-opacity-50 backdrop-blur-xl z-50">
      <div className="max-w-7xl w-full m-auto flex justify-between items-center p-4 text-white font-semibold">
        <Link href="/" className="flex gap-4 items-center cursor-pointer">
          <Image
            src={`${basePath}/images/logo/logo_1.0.png`}
            alt="logo"
            height={50}
            width={50}
          />
          <h1 className="text-xl">Mackerel Fish Shop</h1>
        </Link>
        <div className="flex gap-8 font-semibold">
          {/* <Link href="/">หน้าหลัก</Link> */}
          <button onClick={() => router.push("/")}>หน้าหลัก</button>
          {/* <Link href="/pages/auth/login">เข้าสู่ระบบ</Link> */}
          <button onClick={() => router.push("/pages/auth/login")}>
            เข้าสู่ระบบ
          </button>
          {/* <Link href="/pages/workshop">บทเรียน</Link> */}
          <button onClick={() => router.push("/pages/workshop")}>
            บทเรียน
          </button>
          {/* <Link href="/pages/docs">ใบความรู้</Link> */}
          <button onClick={() => router.push("/pages/docs")}>ใบความรู้</button>
          <button onClick={() => router.push("/pages/sticker_line_shop")}>
            ซื้อสติ๊กเกอร์ไลน์
          </button>
        </div>
      </div>
    </nav>
  );
}
