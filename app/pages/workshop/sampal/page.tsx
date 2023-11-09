"use client";

import Link from "next/link";
import { Button } from "@nextui-org/react";
import { useRouter } from "next/navigation";

export default function Sampal() {
  const router = useRouter();

  return (
    <div className="h-screen flex flex-col gap-4 justify-center items-center">
      <h1>ข้อมูลที่ต้องการแสดงบนเว็บเพจ</h1>

      <Button color="danger" radius="sm" variant="ghost" onClick={router.back}>
        ย้อนกลับ
      </Button>
    </div>
  );
}
