package main

import (
	"fmt"
	"log"
	"net"
	"time"
	pb "github.com/xanpen/grpc-sample/Pb_Go"
	"golang.org/x/net/context"
	"google.golang.org/grpc"
)

const (
	addr = ":50051"
)

type server struct {

}

func (s *server) SayHello (ctx context.Context, u *pb.User) (*pb.Response, error){
	return &pb.Response{ErrCode:0, ErrMsg:"success", Data: map[string]string{"name": "Hello " + u.Name}}, nil
}

func main() {
	lis, err := net.Listen("tcp", addr)
	if err != nil {
		log.Fatalf("failed to listen: %v\n", err)
	}

	fmt.Printf("%s server start at %s\n", time.Now(), addr)

	s := grpc.NewServer()
	pb.RegisterGreeterServiceServer(s, &server{})
	s.Serve(lis)
}