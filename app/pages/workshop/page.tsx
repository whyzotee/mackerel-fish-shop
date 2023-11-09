"use client";
/* eslint-disable @next/next/no-img-element */
import Link from "next/link";
import { Button } from "@nextui-org/react";
import { useRouter } from "next/navigation";

export default function Workshop() {
  const router = useRouter();

  return (
    <div className="h-screen flex flex-col gap-12 justify-center items-center">
      <div className="text-4xl">
        <h1>List of บทเรียน</h1>
        <img
          src="https://media.tenor.com/P-8ZvqnS4AwAAAAM/dancing-cat-dancing-kitten.gif"
          alt="cat_dance"
          height="200"
          className="rounded-full"
        />
      </div>
      <div className="flex gap-12">
        <ul className="flex flex-col gap-4 list-disc">
          <h5 className="text-3xl">สัปดาห์ที่ 10</h5>
          <li>
            <Button
              color="danger"
              radius="sm"
              variant="ghost"
              onClick={() => router.push("/pages/workshop/sampal")}
            >
              sampal.html
            </Button>
          </li>
          <li>
            <Button
              color="danger"
              radius="sm"
              variant="ghost"
              onClick={() => router.push("/pages/workshop/tagh")}
            >
              tagH.html
            </Button>
          </li>
          <li>
            <Link href="/pages/workshop/1_structuring">
              <Button color="danger" radius="sm" variant="ghost">
                ใบงานที่ 1 (Structuring)
              </Button>
            </Link>
          </li>
        </ul>
        <ul className="flex flex-col gap-4 list-disc">
          <h5 className="text-3xl">สัปดาห์ที่ 11</h5>
          <li>
            <Link href="/pages/workshop/2_links_navigation">
              <Button color="danger" radius="sm" variant="ghost">
                ใบงานที่ 2 (Links_Navigation)
              </Button>
            </Link>
          </li>
          <li>
            <Link href="/pages/workshop/3_images_audio_video">
              <Button color="danger" radius="sm" variant="ghost">
                ใบงานที่ 3 (Images_Audio_Video)
              </Button>
            </Link>
          </li>
        </ul>
        <ul className="flex flex-col gap-4 list-disc">
          <h5 className="text-3xl">สัปดาห์ที่ 12</h5>
          <li>
            <Link href="/pages/workshop/4_tables">
              <Button color="danger" radius="sm" variant="ghost">
                ใบงานที่ 4 (Tables)
              </Button>
            </Link>
          </li>
          <li>
            <Link href="/pages/workshop/5_forms">
              <Button color="danger" radius="sm" variant="ghost">
                ใบงานที่ 5 (Forms)
              </Button>
            </Link>
          </li>
          <li>
            <Link href="/pages/workshop/6_frames">
              <Button color="danger" radius="sm" variant="ghost">
                ใบงานที่ 6 (Frames)
              </Button>
            </Link>
          </li>
        </ul>
        <ul className="flex flex-col gap-4 list-disc">
          <h5 className="text-3xl">สัปดาห์ที่ 14</h5>
          <li>
            <Link href="/pages/workshop/test_html_b">
              <Button color="danger" radius="sm" variant="ghost">
                testMid(ชุด B)
              </Button>
            </Link>
          </li>
        </ul>
      </div>

      <Button color="danger" radius="sm" variant="ghost" onClick={router.back}>
        Back To Home Page
      </Button>
    </div>
  );
}
