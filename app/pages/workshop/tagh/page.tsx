"use client";

import { Button } from "@nextui-org/react";
import { useRouter } from "next/navigation";

export default function Tagh() {
  const router = useRouter();

  return (
    <div className="h-screen flex flex-col justify-center">
      <h1 className="text-[2.125rem]">
        การกำหนดขนาดของหัวเรื่อง ให้เท่ากับ H1
      </h1>
      <h2 className="text-[1.875rem]">
        การกำหนดขนาดของหัวเรื่อง ให้เท่ากับ H2
      </h2>
      <h3 className="text-[1.5rem]">การกำหนดขนาดของหัวเรื่อง ให้เท่ากับ H3</h3>
      <h4 className="text-[1.25rem] text-center">
        การกำหนดขนาดของหัวเรื่อง ให้เท่ากับ H4 และให้อยู่กลางเพจ
      </h4>
      <br />
      <Button
        className="self-center"
        color="danger"
        radius="sm"
        variant="ghost"
        onClick={router.back}
      >
        ย้อนกลับ
      </Button>
    </div>
  );
}
