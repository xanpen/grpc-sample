package main

import (
	"context"
	"google.golang.org/grpc";
	"testing";
	pb "github.com/xanpen/grpc-sample/Pb_Go"
)

func TestExec(t *testing.T)  {
	conn, err := grpc.Dial(":50051", grpc.WithInsecure())

	if err != nil {
		t.Errorf("dial error: %v\n", err)
	}

	defer conn.Close()

	client := pb.NewGreeterServiceClient(conn)

	user := pb.User{}
	user.Id = 6596
	user.Name = "wangxp"
	result, err := client.SayHello(context.Background(), &user)
	if err != nil {
		t.Errorf("grpc error : %v\n", err)
	}
	t.Logf("Recevied: %v\n", result)
}