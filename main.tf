terraform {
  required_providers {
    hcloud = {
      source = "hetznercloud/hcloud"
      version = "1.51.0"
    }
  }
}

variable "hcloud_token" {
  sensitive = true
}

provider "hcloud" {
  token = var.hcloud_token
}

moved {
  from = hcloud_primary_ip.eleutheria_public_ip
  to = hcloud_primary_ip.eleutheria_public_ip4
}

resource "hcloud_primary_ip" "eleutheria_public_ip4" {
  name = "eleutheria_public_ip4"
  type = "ipv4"
  assignee_type = "server"
  datacenter = "hel1-dc2"
  auto_delete = false
  labels = {
    "automation": "opentofu"
  }
}
resource "hcloud_primary_ip" "eleutheria_public_ip6" {
  name = "eleutheria_public_ip6"
  type = "ipv6"
  assignee_type = "server"
  datacenter = "hel1-dc2"
  auto_delete = false
  labels = {
    "automation": "opentofu"
  }
}

resource "hcloud_ssh_key" "sutaai" {
  name = "sutaai"
  public_key = file("~/.ssh/id_ed25519.pub")
}

resource "hcloud_server" "eleutheria" {
  name = "eleutheria"
  server_type = "cx22"
  datacenter = "hel1-dc2"
  image = "ubuntu-22.04"
  ssh_keys = [ hcloud_ssh_key.sutaai.id ]
  labels = {
    "automation": "opentofu"
  }

  public_net {
    ipv4_enabled = true
    ipv4 = hcloud_primary_ip.eleutheria_public_ip4.id
    ipv6_enabled = true
    ipv6 = hcloud_primary_ip.eleutheria_public_ip6.id
  }
}
