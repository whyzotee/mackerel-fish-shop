import Image from "next/image";
import { basePath } from "../../core/settings";

export default function StickerLineShop() {
  const sticker_stactic = [
    "1.พิซซ่ามาส่งครับ",
    "2.20 ครับพี่",
    "3.very good",
    "4.น่าสงสัย",
    "5.ขอโทษครับ",
    "6.โคตรฉลาด",
    "7.เหล่ท่อ",
    "8.หยิกแก้ม",
  ];

  const sticker_animation = [
    "1.พิซซ่ามาส่งครับ",
    "2.20 ครับพี่",
    "3.very good",
    "4.น่าสงสัย",
    "5.ขอโทษครับ",
    "6.โคตรฉลาด",
    "7.เหล่ท่อ",
    "8.หยิกแก้ม",
  ];

  return (
    <main className="max-w-7xl w-full pt-32 px-24 m-auto flex flex-col gap-12 ">
      <p>
        ออกแบบชิ้นงานสติกเกอร์ภาพนิ่ง&ensp;
        <span className="text-[#f20b26]">[สร้างอาชีพได้ด้วย Line Studio]</span>
      </p>
      <div className="grid grid-cols-4 gap-4">
        {sticker_stactic.map((name, index) => (
          <div
            key={index}
            className="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl"
          >
            <Image
              src={`${basePath}/images/line_stickers/${index + 1}.png`}
              alt={`${index + 1}.png`}
              height={150}
              width={150}
            />
            <h1>{name}</h1>
            <p className="text-[#777]">ฉัตรนรินทร บุญแสง</p>
          </div>
        ))}
      </div>
      <p>
        งานแต่งภาพสติกเกอร์ภาพเคลื่อนไหว&ensp;
        <span className="text-[#f20b26]">[สร้างอาชีพได้ด้วย Line Studio]</span>
      </p>
      <div className="grid grid-cols-4 gap-4">
        {sticker_animation.map((name, index) => (
          <div
            key={index}
            className="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl"
          >
            <Image
              src={`${basePath}/images/line_stickers/${index + 1}.png`}
              alt={`${index + 1}.png`}
              height={150}
              width={150}
            />
            <h1>{name}</h1>
            <p className="text-[#777]">ฉัตรนรินทร บุญแสง</p>
          </div>
        ))}
      </div>
      <p className="w-fit text-white bg-[#F31260] rounded-lg py-2 px-4 m-8 self-center">
        เย็นนี้กินไรดี, whyzotee © 2023 All Rights Reserved
      </p>
    </main>
  );
}
