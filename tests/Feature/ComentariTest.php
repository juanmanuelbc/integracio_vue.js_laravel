<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComentariTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->get('/api/post/1/comentari');

        $response->assertStatus(200)->assertJson([]);
    }

    public function testStore()
    {
        $response = $this->post('/api/post/1/comentari', [
            'text' => 'Comentari de prova'
        ]);

        $response->assertStatus(200)->assertJson([]);
    }

    public function testShow()
    {
        $response = $this->get('/api/post/1/comentari/1');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'text',
            'created_at',
            'updated_at',
            'idPost',
            'idUsuari',
            'deleted_at'
        ]);
    }

    public function testUpdate()
    {
        $response = $this->put('api/post/1/comentari/4', [
            'text' => 'Comentari de prova (modificat)'
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'text',
            'created_at',
            'updated_at',
            'idPost',
            'idUsuari',
            'deleted_at'
        ]);
    }

    public function testDestroy()
    {
        $response = $this->delete('api/post/1/comentari/4');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'text',
            'created_at',
            'updated_at',
            'idPost',
            'idUsuari',
            'deleted_at'
        ]);
    }

    public function testProtectedStore()
    {
        $response = $this->postJson('/api/post/1/comentari');
        
        $response->assertStatus(401);
    }

    public function testProtectedUpdate()
    {
        $response = $this->putJson('/api/post/1/comentari/4');
        
        $response->assertStatus(401);
    }

    public function testProtectedDestroy()
    {
        $response = $this->deleteJson('/api/post/1/comentari/4');
        
        $response->assertStatus(401);
    }

    public function testJWTProtectedStore()
    {
        $access_token = "eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJ2NjEwbmprYmdjd0pZRnhCR18xQ3dDRFBrWFNMZXE4MFBjYk1ocnhjTnFVIn0.eyJqdGkiOiI4NzY1YTE1Zi1jODYzLTRmM2MtOTkwZS04MmNlMDBlYzUwMTkiLCJleHAiOjE2MTc3OTU3MzAsIm5iZiI6MCwiaWF0IjoxNjE3NzkzOTMwLCJpc3MiOiJodHRwczovL2xvZ2lucHJlLmltYXNtYWxsb3JjYS5uZXQvYXV0aC9yZWFsbXMvaW1hc3ByZSIsImF1ZCI6ImFjY291bnQiLCJzdWIiOiI1NWQ2OGM4ZC02Y2QwLTRlZmMtYWVhMS1kY2YxZjBhMzIxYzAiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJhcHBzLWltYXNwcmUiLCJhdXRoX3RpbWUiOjAsInNlc3Npb25fc3RhdGUiOiIyNmU1Njg4NC1iYjM0LTRlOGUtOTUzMC1jODgyMjZiMGU1NTYiLCJhY3IiOiIxIiwiYWxsb3dlZC1vcmlnaW5zIjpbIioiXSwicmVhbG1fYWNjZXNzIjp7InJvbGVzIjpbInJvbC1wb2xpY3ktb3duY2xvdWQiLCJyb2wtR0lUIiwicm9sLVBSSVJNSSIsInJvbC1STUlQUFIiLCJyb2wtUk1JTVRFUFJPIiwicm9sLUNORiIsInJvbC13aWtpZGV2Iiwicm9sLVBSSVNTTUlOUyIsInJvbC1TU01JTlMiLCJyb2wtQUVJIiwicm9sLWFwbGljYWNpb25zIiwib2ZmbGluZV9hY2Nlc3MiLCJyb2wtU1NNUFJWQ09NIiwicm9sLVBSSUZSTSIsInJvbC1teXNxbCIsInJvbC1BRUlSRUQiLCJ1bWFfYXV0aG9yaXphdGlvbiIsInJvbC1HSVBDSVNUIiwicm9sLXBvcnRhbCIsInJvbC1NTlQiLCJyb2wtUFJJUk1JTVRFIiwicm9sLVJNSUJBUkVDTyIsInJvbC1JTFMiLCJyb2wtSW5ldFBlcmZpbDMiLCJyb2wtbXlzcWwtcHJlIiwicm9sLVJNSU1URSIsInJvbC1kb21pbmkiLCJyb2wtUk1JVEVDUkVTIiwicm9sLVNTTVJNSSIsInJvbC1GUk0iLCJyb2wtUk1JRVRSIiwicm9sLVNTTUNBRCIsInJvbC1FTlQiXX0sInJlc291cmNlX2FjY2VzcyI6eyJhY2NvdW50Ijp7InJvbGVzIjpbIm1hbmFnZS1hY2NvdW50IiwibWFuYWdlLWFjY291bnQtbGlua3MiLCJ2aWV3LXByb2ZpbGUiXX19LCJzY29wZSI6Im9wZW5pZCBlbWFpbCByb2xzLWxkYXAtaW1hcyBwcm9maWxlIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJ0ZWxlcGhvbmVudW1iZXIiOiI0MzMxIiwiZW1wbG95ZWVudW1iZXIiOiI0MzExMTU4NFEiLCJzaGFkb3dNYXgiOjQ1LCJzaGFkb3dXYXJuaW5nIjo3LCJwcmVmZXJyZWRfdXNlcm5hbWUiOiJ1MjU0ODMiLCJnaXZlbl9uYW1lIjoiSlVBTiBNQU5VRUwiLCJsb2NhbGUiOiJjYSIsImxkYXBSb2xzIjpbInJvbC1wb2xpY3ktb3duY2xvdWQiLCJyb2wtR0lUIiwicm9sLVBSSVJNSSIsInJvbC1STUlQUFIiLCJyb2wtUk1JTVRFUFJPIiwicm9sLUNORiIsInJvbC13aWtpZGV2Iiwicm9sLVBSSVNTTUlOUyIsInJvbC1TU01JTlMiLCJyb2wtQUVJIiwicm9sLWFwbGljYWNpb25zIiwib2ZmbGluZV9hY2Nlc3MiLCJyb2wtU1NNUFJWQ09NIiwicm9sLVBSSUZSTSIsInJvbC1teXNxbCIsInJvbC1BRUlSRUQiLCJ1bWFfYXV0aG9yaXphdGlvbiIsInJvbC1HSVBDSVNUIiwicm9sLXBvcnRhbCIsInJvbC1NTlQiLCJyb2wtUFJJUk1JTVRFIiwicm9sLVJNSUJBUkVDTyIsInJvbC1JTFMiLCJyb2wtSW5ldFBlcmZpbDMiLCJyb2wtbXlzcWwtcHJlIiwicm9sLVJNSU1URSIsInJvbC1kb21pbmkiLCJyb2wtUk1JVEVDUkVTIiwicm9sLVNTTVJNSSIsInJvbC1GUk0iLCJyb2wtUk1JRVRSIiwicm9sLVNTTUNBRCIsInJvbC1FTlQiXSwic2hhZG93TGFzdENoYW5nZSI6MTg3MjQsImVtcGxveWVlVHlwZSI6IkVOR0lOWUVSL0EgVMOIQ05JQy9BIERFU0VOVk9MVVBBTUVOVCIsInNoYWRvd0luYWN0aXZlIjo1LCJuYW1lIjoiSlVBTiBNQU5VRUwgQkVOTkFTU0FSIENBUlJFVEVSTyIsImZhbWlseV9uYW1lIjoiQkVOTkFTU0FSIENBUlJFVEVSTyIsImVtYWlsIjoiam1iZW5uYXNzYXJAaW1hcy5jb25zZWxsZGVtYWxsb3JjYS5uZXQifQ.USZuYqiU4sk-0Kzf6JKQIHTIcObVNhRLLTnsFN9GF-WM2gXPqM2AvZV9moA7MYYRiai3xf65TgEMN46uBrEEUfKS4ZnlvnDF1q7PHP7Bzfo3IZCc4IVGphjXQoFLDpjSlDM9ePA-LrL09PE3wglhl5eY8WLeI1gd6edIOrxAqvNR3VP9tN7mcEjAfpWQS_6mnYAqKfBeKa0cOx53rU8Pe-Oe9llIO2fm7JyiWo3N430ZAQGwdOdSd8SDeKYP2HaWaot6A8IGiD0Uw6Zegl6CwFahxB5lXoA-Ks3-LZGbFKGSXwRddQjbKMSgYK0Q8wrCWkahzh0MQ09jjVFVR-XrKg";

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $access_token,
        ])->postJson('/api/post/1/comentari', [
            'text' => 'Comentari de prova'
        ]);
    
        $response->assertStatus(200);
    }

    public function testJWTProtectedUpdate()
    {
        $access_token = "eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJ2NjEwbmprYmdjd0pZRnhCR18xQ3dDRFBrWFNMZXE4MFBjYk1ocnhjTnFVIn0.eyJqdGkiOiI4NzY1YTE1Zi1jODYzLTRmM2MtOTkwZS04MmNlMDBlYzUwMTkiLCJleHAiOjE2MTc3OTU3MzAsIm5iZiI6MCwiaWF0IjoxNjE3NzkzOTMwLCJpc3MiOiJodHRwczovL2xvZ2lucHJlLmltYXNtYWxsb3JjYS5uZXQvYXV0aC9yZWFsbXMvaW1hc3ByZSIsImF1ZCI6ImFjY291bnQiLCJzdWIiOiI1NWQ2OGM4ZC02Y2QwLTRlZmMtYWVhMS1kY2YxZjBhMzIxYzAiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJhcHBzLWltYXNwcmUiLCJhdXRoX3RpbWUiOjAsInNlc3Npb25fc3RhdGUiOiIyNmU1Njg4NC1iYjM0LTRlOGUtOTUzMC1jODgyMjZiMGU1NTYiLCJhY3IiOiIxIiwiYWxsb3dlZC1vcmlnaW5zIjpbIioiXSwicmVhbG1fYWNjZXNzIjp7InJvbGVzIjpbInJvbC1wb2xpY3ktb3duY2xvdWQiLCJyb2wtR0lUIiwicm9sLVBSSVJNSSIsInJvbC1STUlQUFIiLCJyb2wtUk1JTVRFUFJPIiwicm9sLUNORiIsInJvbC13aWtpZGV2Iiwicm9sLVBSSVNTTUlOUyIsInJvbC1TU01JTlMiLCJyb2wtQUVJIiwicm9sLWFwbGljYWNpb25zIiwib2ZmbGluZV9hY2Nlc3MiLCJyb2wtU1NNUFJWQ09NIiwicm9sLVBSSUZSTSIsInJvbC1teXNxbCIsInJvbC1BRUlSRUQiLCJ1bWFfYXV0aG9yaXphdGlvbiIsInJvbC1HSVBDSVNUIiwicm9sLXBvcnRhbCIsInJvbC1NTlQiLCJyb2wtUFJJUk1JTVRFIiwicm9sLVJNSUJBUkVDTyIsInJvbC1JTFMiLCJyb2wtSW5ldFBlcmZpbDMiLCJyb2wtbXlzcWwtcHJlIiwicm9sLVJNSU1URSIsInJvbC1kb21pbmkiLCJyb2wtUk1JVEVDUkVTIiwicm9sLVNTTVJNSSIsInJvbC1GUk0iLCJyb2wtUk1JRVRSIiwicm9sLVNTTUNBRCIsInJvbC1FTlQiXX0sInJlc291cmNlX2FjY2VzcyI6eyJhY2NvdW50Ijp7InJvbGVzIjpbIm1hbmFnZS1hY2NvdW50IiwibWFuYWdlLWFjY291bnQtbGlua3MiLCJ2aWV3LXByb2ZpbGUiXX19LCJzY29wZSI6Im9wZW5pZCBlbWFpbCByb2xzLWxkYXAtaW1hcyBwcm9maWxlIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJ0ZWxlcGhvbmVudW1iZXIiOiI0MzMxIiwiZW1wbG95ZWVudW1iZXIiOiI0MzExMTU4NFEiLCJzaGFkb3dNYXgiOjQ1LCJzaGFkb3dXYXJuaW5nIjo3LCJwcmVmZXJyZWRfdXNlcm5hbWUiOiJ1MjU0ODMiLCJnaXZlbl9uYW1lIjoiSlVBTiBNQU5VRUwiLCJsb2NhbGUiOiJjYSIsImxkYXBSb2xzIjpbInJvbC1wb2xpY3ktb3duY2xvdWQiLCJyb2wtR0lUIiwicm9sLVBSSVJNSSIsInJvbC1STUlQUFIiLCJyb2wtUk1JTVRFUFJPIiwicm9sLUNORiIsInJvbC13aWtpZGV2Iiwicm9sLVBSSVNTTUlOUyIsInJvbC1TU01JTlMiLCJyb2wtQUVJIiwicm9sLWFwbGljYWNpb25zIiwib2ZmbGluZV9hY2Nlc3MiLCJyb2wtU1NNUFJWQ09NIiwicm9sLVBSSUZSTSIsInJvbC1teXNxbCIsInJvbC1BRUlSRUQiLCJ1bWFfYXV0aG9yaXphdGlvbiIsInJvbC1HSVBDSVNUIiwicm9sLXBvcnRhbCIsInJvbC1NTlQiLCJyb2wtUFJJUk1JTVRFIiwicm9sLVJNSUJBUkVDTyIsInJvbC1JTFMiLCJyb2wtSW5ldFBlcmZpbDMiLCJyb2wtbXlzcWwtcHJlIiwicm9sLVJNSU1URSIsInJvbC1kb21pbmkiLCJyb2wtUk1JVEVDUkVTIiwicm9sLVNTTVJNSSIsInJvbC1GUk0iLCJyb2wtUk1JRVRSIiwicm9sLVNTTUNBRCIsInJvbC1FTlQiXSwic2hhZG93TGFzdENoYW5nZSI6MTg3MjQsImVtcGxveWVlVHlwZSI6IkVOR0lOWUVSL0EgVMOIQ05JQy9BIERFU0VOVk9MVVBBTUVOVCIsInNoYWRvd0luYWN0aXZlIjo1LCJuYW1lIjoiSlVBTiBNQU5VRUwgQkVOTkFTU0FSIENBUlJFVEVSTyIsImZhbWlseV9uYW1lIjoiQkVOTkFTU0FSIENBUlJFVEVSTyIsImVtYWlsIjoiam1iZW5uYXNzYXJAaW1hcy5jb25zZWxsZGVtYWxsb3JjYS5uZXQifQ.USZuYqiU4sk-0Kzf6JKQIHTIcObVNhRLLTnsFN9GF-WM2gXPqM2AvZV9moA7MYYRiai3xf65TgEMN46uBrEEUfKS4ZnlvnDF1q7PHP7Bzfo3IZCc4IVGphjXQoFLDpjSlDM9ePA-LrL09PE3wglhl5eY8WLeI1gd6edIOrxAqvNR3VP9tN7mcEjAfpWQS_6mnYAqKfBeKa0cOx53rU8Pe-Oe9llIO2fm7JyiWo3N430ZAQGwdOdSd8SDeKYP2HaWaot6A8IGiD0Uw6Zegl6CwFahxB5lXoA-Ks3-LZGbFKGSXwRddQjbKMSgYK0Q8wrCWkahzh0MQ09jjVFVR-XrKg";

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $access_token,
        ])->putJson('/api/post/1/comentari/4', [
            'text' => 'Comentari de prova (modificat)'
        ]);
    
        $response->assertStatus(200);
    }

    public function testJWTProtectedDestroy()
    {
        $access_token = "eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJ2NjEwbmprYmdjd0pZRnhCR18xQ3dDRFBrWFNMZXE4MFBjYk1ocnhjTnFVIn0.eyJqdGkiOiI4NzY1YTE1Zi1jODYzLTRmM2MtOTkwZS04MmNlMDBlYzUwMTkiLCJleHAiOjE2MTc3OTU3MzAsIm5iZiI6MCwiaWF0IjoxNjE3NzkzOTMwLCJpc3MiOiJodHRwczovL2xvZ2lucHJlLmltYXNtYWxsb3JjYS5uZXQvYXV0aC9yZWFsbXMvaW1hc3ByZSIsImF1ZCI6ImFjY291bnQiLCJzdWIiOiI1NWQ2OGM4ZC02Y2QwLTRlZmMtYWVhMS1kY2YxZjBhMzIxYzAiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJhcHBzLWltYXNwcmUiLCJhdXRoX3RpbWUiOjAsInNlc3Npb25fc3RhdGUiOiIyNmU1Njg4NC1iYjM0LTRlOGUtOTUzMC1jODgyMjZiMGU1NTYiLCJhY3IiOiIxIiwiYWxsb3dlZC1vcmlnaW5zIjpbIioiXSwicmVhbG1fYWNjZXNzIjp7InJvbGVzIjpbInJvbC1wb2xpY3ktb3duY2xvdWQiLCJyb2wtR0lUIiwicm9sLVBSSVJNSSIsInJvbC1STUlQUFIiLCJyb2wtUk1JTVRFUFJPIiwicm9sLUNORiIsInJvbC13aWtpZGV2Iiwicm9sLVBSSVNTTUlOUyIsInJvbC1TU01JTlMiLCJyb2wtQUVJIiwicm9sLWFwbGljYWNpb25zIiwib2ZmbGluZV9hY2Nlc3MiLCJyb2wtU1NNUFJWQ09NIiwicm9sLVBSSUZSTSIsInJvbC1teXNxbCIsInJvbC1BRUlSRUQiLCJ1bWFfYXV0aG9yaXphdGlvbiIsInJvbC1HSVBDSVNUIiwicm9sLXBvcnRhbCIsInJvbC1NTlQiLCJyb2wtUFJJUk1JTVRFIiwicm9sLVJNSUJBUkVDTyIsInJvbC1JTFMiLCJyb2wtSW5ldFBlcmZpbDMiLCJyb2wtbXlzcWwtcHJlIiwicm9sLVJNSU1URSIsInJvbC1kb21pbmkiLCJyb2wtUk1JVEVDUkVTIiwicm9sLVNTTVJNSSIsInJvbC1GUk0iLCJyb2wtUk1JRVRSIiwicm9sLVNTTUNBRCIsInJvbC1FTlQiXX0sInJlc291cmNlX2FjY2VzcyI6eyJhY2NvdW50Ijp7InJvbGVzIjpbIm1hbmFnZS1hY2NvdW50IiwibWFuYWdlLWFjY291bnQtbGlua3MiLCJ2aWV3LXByb2ZpbGUiXX19LCJzY29wZSI6Im9wZW5pZCBlbWFpbCByb2xzLWxkYXAtaW1hcyBwcm9maWxlIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJ0ZWxlcGhvbmVudW1iZXIiOiI0MzMxIiwiZW1wbG95ZWVudW1iZXIiOiI0MzExMTU4NFEiLCJzaGFkb3dNYXgiOjQ1LCJzaGFkb3dXYXJuaW5nIjo3LCJwcmVmZXJyZWRfdXNlcm5hbWUiOiJ1MjU0ODMiLCJnaXZlbl9uYW1lIjoiSlVBTiBNQU5VRUwiLCJsb2NhbGUiOiJjYSIsImxkYXBSb2xzIjpbInJvbC1wb2xpY3ktb3duY2xvdWQiLCJyb2wtR0lUIiwicm9sLVBSSVJNSSIsInJvbC1STUlQUFIiLCJyb2wtUk1JTVRFUFJPIiwicm9sLUNORiIsInJvbC13aWtpZGV2Iiwicm9sLVBSSVNTTUlOUyIsInJvbC1TU01JTlMiLCJyb2wtQUVJIiwicm9sLWFwbGljYWNpb25zIiwib2ZmbGluZV9hY2Nlc3MiLCJyb2wtU1NNUFJWQ09NIiwicm9sLVBSSUZSTSIsInJvbC1teXNxbCIsInJvbC1BRUlSRUQiLCJ1bWFfYXV0aG9yaXphdGlvbiIsInJvbC1HSVBDSVNUIiwicm9sLXBvcnRhbCIsInJvbC1NTlQiLCJyb2wtUFJJUk1JTVRFIiwicm9sLVJNSUJBUkVDTyIsInJvbC1JTFMiLCJyb2wtSW5ldFBlcmZpbDMiLCJyb2wtbXlzcWwtcHJlIiwicm9sLVJNSU1URSIsInJvbC1kb21pbmkiLCJyb2wtUk1JVEVDUkVTIiwicm9sLVNTTVJNSSIsInJvbC1GUk0iLCJyb2wtUk1JRVRSIiwicm9sLVNTTUNBRCIsInJvbC1FTlQiXSwic2hhZG93TGFzdENoYW5nZSI6MTg3MjQsImVtcGxveWVlVHlwZSI6IkVOR0lOWUVSL0EgVMOIQ05JQy9BIERFU0VOVk9MVVBBTUVOVCIsInNoYWRvd0luYWN0aXZlIjo1LCJuYW1lIjoiSlVBTiBNQU5VRUwgQkVOTkFTU0FSIENBUlJFVEVSTyIsImZhbWlseV9uYW1lIjoiQkVOTkFTU0FSIENBUlJFVEVSTyIsImVtYWlsIjoiam1iZW5uYXNzYXJAaW1hcy5jb25zZWxsZGVtYWxsb3JjYS5uZXQifQ.USZuYqiU4sk-0Kzf6JKQIHTIcObVNhRLLTnsFN9GF-WM2gXPqM2AvZV9moA7MYYRiai3xf65TgEMN46uBrEEUfKS4ZnlvnDF1q7PHP7Bzfo3IZCc4IVGphjXQoFLDpjSlDM9ePA-LrL09PE3wglhl5eY8WLeI1gd6edIOrxAqvNR3VP9tN7mcEjAfpWQS_6mnYAqKfBeKa0cOx53rU8Pe-Oe9llIO2fm7JyiWo3N430ZAQGwdOdSd8SDeKYP2HaWaot6A8IGiD0Uw6Zegl6CwFahxB5lXoA-Ks3-LZGbFKGSXwRddQjbKMSgYK0Q8wrCWkahzh0MQ09jjVFVR-XrKg";

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $access_token,
        ])->deleteJson('/api/post/1/comentari/4');
    
        $response->assertStatus(200);
    }

}
