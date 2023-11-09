"use client";
/* eslint-disable @next/next/no-img-element */
import Link from "next/link";
import { Button } from "@nextui-org/react";
import { useRouter } from "next/navigation";
import { basePath } from "@/app/core/settings";

export default function Docs() {
  const router = useRouter();

  return (
    <main className="h-screen flex flex-col gap-12 items-center justify-center">
      <div className="flex flex-col">
        <h1 className="text-3xl">List of ใบความรู้</h1>
        <img
          src="https://media.tenor.com/P-8ZvqnS4AwAAAAM/dancing-cat-dancing-kitten.gif"
          alt="cat_dance"
          height="200"
          className="rounded-full"
        />
      </div>

      <div className="flex gap-12">
        <Link href="/docs/Mackerel_fish_shop 1.0.pdf" target="_blank">
          <img
            src={`${basePath}/images/docs/img1.0.jpg`}
            alt="img1"
            className="h-[300px] shadow-xl hover:scale-105 transition-all rounded-lg"
          />
        </Link>
        <Link href="/docs/Mackerel_fish_shop 2.0.pdf" target="_blank">
          <img
            src={`${basePath}/images/docs/img2.0.jpg`}
            alt="img1"
            className="h-[300px] shadow-xl hover:scale-105 transition-all rounded-lg"
          />
        </Link>
        <Link href="/docs/Mackerel_fish_shop 3.0.pdf" target="_blank">
          <img
            src={`${basePath}/images/docs/img3.0.jpg`}
            alt="img1"
            className="h-[300px] shadow-xl hover:scale-105 transition-all rounded-lg"
          />
        </Link>
        <Link href="/docs/Mackerel_fish_shop 4.0.pdf" target="_blank">
          <img
            src={`${basePath}/images/docs/img4.0.jpg`}
            alt="img1"
            className="h-[300px] shadow-xl hover:scale-105 transition-all rounded-lg"
          />
        </Link>
      </div>

      <Button color="danger" radius="sm" variant="ghost" onClick={router.back}>
        Back To Home Page
      </Button>
    </main>
  );
}
