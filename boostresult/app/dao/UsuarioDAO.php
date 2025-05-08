<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	
	session_start();
class UsuarioDAO{

	//Carrega um elemento pela chave primária
	public function carregar($id_user){
        try {
			$sql = 'SELECT * FROM usuario WHERE id_user = :id_user';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id_user",$id_user);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao carregar Usuario <br>" . $e . '<br>';
        }
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
        try {
			$sql = 'SELECT * FROM usuario';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Usuarios <br>" . $e . '<br>';
        }
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
        try {
			$sql = 'SELECT * FROM usuario ORDER BY '.$coluna;
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Usuarios <br>" . $e . '<br>';
        }
	}
	
	
	//Busca elementos da tabela
	public function buscar($coluna, $valor){
        try {
			$sql = 'SELECT * FROM usuario WHERE id_user LIKE :valor';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor",$valor);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Erro ao listar Usuarios <br>" . $e . '<br>';
        }
	}
	
	//Apaga um elemento da tabela
	public function deletar(Usuario $usuario){
        try {
			$sql = 'DELETE FROM usuario WHERE id_user = :chave';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":chave",$usuario->getid_user());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Usuario <br>" . $e . '<br>';
        }
	}
	
	//Insere um elemento na tabela
	public function inserir(Usuario $usuario){
        try {
			$sql = 'INSERT INTO usuario (nome, idade, telefone, email, senha, sexo, tipo) VALUES (:nome, :idade, :telefone, :email, :senha, :sexo, :tipo)';
			$consulta = Conexao::getConexao()->prepare($sql);

			$consulta->bindValue(':nome',$usuario->getNome()); 

			$consulta->bindValue(':idade',$usuario->getIdade()); 

			$consulta->bindValue(':telefone',$usuario->getTelefone()); 

			$consulta->bindValue(':email',$usuario->getEmail()); 

			$consulta->bindValue(':senha',sha1(md5($usuario->getSenha()))); 

			$consulta->bindValue(':sexo',$usuario->getSexo()); 

			$consulta->bindValue(':tipo',$usuario->getTipo());
			$consulta->execute();
        } catch (Exception $e) {
            print "Erro ao inserir Usuario <br>" . $e . '<br>';
        }
	}

	public function logar(Usuario $usuario){
		try {
			$sql = 'SELECT * FROM usuario WHERE email = :email AND senha = :senha';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":email",$usuario->getEmail());
			$consulta->bindValue(":senha",sha1(md5($usuario->getSenha())));
			$consulta->execute();
			if ($consulta->rowCount() > 0) {
				$dadosUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
			
				$_SESSION['email'] = $dadosUsuario['email'];
				$_SESSION['nome']  = $dadosUsuario['nome']; 
			}
				
        } catch (Exception $e) {
            print "Erro ao inserir Usuario <br>" . $e . '<br>';
        }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar(Usuario $usuario){
        try {
			$sql = 'UPDATE usuario SET id_user = :id_user, nome = :nome, idade = :idade, telefone = :telefone, email = :email, senha = :senha, sexo = :sexo, tipo = :tipo WHERE id_user = :id_user';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':id_user',$usuario->getId_user()); 

			$consulta->bindValue(':nome',$usuario->getNome()); 

			$consulta->bindValue(':idade',$usuario->getIdade()); 

			$consulta->bindValue(':telefone',$usuario->getTelefone()); 

			$consulta->bindValue(':email',$usuario->getEmail()); 

			$consulta->bindValue(':senha',$usuario->getSenha()); 

			$consulta->bindValue(':sexo',$usuario->getSexo()); 

			$consulta->bindValue(':tipo',$usuario->getTipo());
			$consulta->execute();			
        } catch (Exception $e) {
            print "Erro ao atualizar Usuario <br>" . $e . '<br>';
        }
	}
}